<?php

use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Support\Facades\Hash;

class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Role::truncate();
        $roles=[
          ['role_id'=>1,'role'=>'user'],
          ['role_id'=>2,'role'=>'superadmin'],
          ['role_id'=>3,'role'=>'admin']
        ];
        foreach($roles as $role)
        {
          $newroles = new Role;
          $newroles->role_id=$role['role_id'];
          $newroles->role=$role['role'];
          $newroles->save();
        }
    }
}
