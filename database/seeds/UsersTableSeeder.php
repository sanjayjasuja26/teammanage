<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::truncate();
        $users=[
          ['name'=>'superadmin','email'=>'superadmin@gmail.com','password'=>Hash::make('123456789'),'role'=>'superadmin'],
          ['name'=>'admin','email'=>'admin@gmail.com','password'=>Hash::make('123456789'),'role'=>'admin']
        ];
        foreach ($users as $user) {
          $newuser= new User;
          $newuser->name=$user['name'];
          $newuser->email=$user['email'];
          $newuser->password=$user['password'];
          $newuser->role=$user['role'];
          $newuser->save();
        }
    }
}
