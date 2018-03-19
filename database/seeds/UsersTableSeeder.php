<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $adminEmail = 'admin@'.config('app.domain_url');
            $admiRrole = Role::where('name', 'admin')->firstOrFail();

            User::create([
                'name'           => 'admin',
                'email'          => $adminEmail,
                'avatar'         => '',
                'password'       => bcrypt('admin'),
                'remember_token' => str_random(60),
                'status'         => true,
                'verified'       => true,
            ]);

            $admin = User::where('email', '=', $adminEmail)->first();

            $admin->attachRole($admiRrole);
        }
    }
}