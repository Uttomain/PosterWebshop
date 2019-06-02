<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_blogger = Role::where('name', 'blogger')->first();
        $role_admin = Role::where('name', 'Admin')->first();

        $user = new User();
        $user->name = 'visitor';
        $user->email = 'visi@gmail.com';
        $user->password = bcrypt('visi123');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin123');
        $admin->save();
        $admin->roles()->attach($role_admin);


        $blogger = new User();
        $blogger->name = 'blogger';
        $blogger->email = 'blogger@gmail.com';
        $blogger->password = bcrypt('blogger123');
        $blogger->save();
        $blogger->roles()->attach($role_blogger);
    }
}
