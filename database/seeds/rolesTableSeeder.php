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
          ['role'=>'user'],
          ['role'=>'superadmin'],
          ['role'=>'admin']
        ];
        foreach($roles as $role)
        {
          $newroles = new Role;
          $newroles->role=$role['role'];
          $newroles->save();
        }
    }
}
