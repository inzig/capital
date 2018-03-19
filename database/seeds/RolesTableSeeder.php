<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (Role::count() == 0) {
            $admin = new Role();
            $admin->name         = 'admin';
            $admin->display_name = 'User Administrator'; // optional
            $admin->description  = 'User is allowed to manage and edit other users'; // optional
            $admin->save();
        }
    }
}