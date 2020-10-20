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
        // Let's clear the users table first
        //User::truncate();

       // DB::tabel('role_users')->truncate();


        $admin=User::create([
            'name'=>'Owner',
            'email'=>'owner@codeminos.dev',
            'password'=>Hash::make("Let'sHike2There"),
            'role_id'=>'1'

        ]);
        $admin->generateToken();

    }
}

