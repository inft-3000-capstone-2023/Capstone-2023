<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin One',
            'email' => 'adminone@example.com',
            'type' => 0, //0 - admin, 1 - client_user, 2 - customer
            'password' => Hash::make('password123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin Two',
            'email' => 'admintwo@example.com',
            'type' => 0, //0 - admin, 1 - client_user, 2 - customer
            'password' => Hash::make('password123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Bob EndUser',
            'email' => 'bob@example.com',
            'type' => 2, //0 - admin, 1 - client_user, 2 - customer
            'password' => Hash::make('password123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Jane EndUser',
            'email' => 'jane@example.com',
            'type' => 2, //0 - admin, 1 - client_user, 2 - customer
            'password' => Hash::make('password123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Jack EndUser',
            'email' => 'jack@example.com',
            'type' => 2, //0 - admin, 1 - client_user, 2 - customer
            'password' => Hash::make('password123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Jill ClientUser',
            'email' => 'jill@example.com',
            'type' => 1, //0 - admin, 1 - client_user, 2 - customer
            'password' => Hash::make('password123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Armand ClientUser',
            'email' => 'armand@example.com',
            'type' => 1, //0 - admin, 1 - client_user, 2 - customer
            'password' => Hash::make('password123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Sam ClientUser',
            'email' => 'sam@example.com',
            'type' => 1, //0 - admin, 1 - client_user, 2 - customer
            'password' => Hash::make('password123'),
        ]);
    }
}
