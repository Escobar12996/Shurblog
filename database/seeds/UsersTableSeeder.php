<?php

use Illuminate\Database\Seeder;
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
        $user = new \App\User();
        $user->name = 'admin';
        $user->user = 'admin';
        $user->email = 'administrador@admin.com';
        $user->type = 'Administrador';
        $user->image = '';
        $user->email_verified_at = '2020-02-22 00:00:00';
        $user->password = Hash::make('12345678');
        $user->save();
    }
}
