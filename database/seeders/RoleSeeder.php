<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Event Manager',
            'description' => 'Manage the creation of events.',
            'created_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'Customer Manager',
            'description' => 'Manage the customers of a client.',
            'created_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'Finance Manager',
            'description' => 'Manage the finances of the client account.',
            'created_at' => Carbon::now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'Client Admin',
            'description' => 'Full administrator of the client ac count.',
            'created_at' => Carbon::now(),
        ]);
    }
}
