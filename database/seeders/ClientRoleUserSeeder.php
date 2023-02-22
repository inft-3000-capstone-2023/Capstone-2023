<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientRoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //client user 1
        DB::table('client_role_user')->insert([
            'client_user_id' => 1,
            'role_id' => 4,
            'created_at' => Carbon::now(),
        ]);

        //client user 2
        DB::table('client_role_user')->insert([
            'client_user_id' => 2,
            'role_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_role_user')->insert([
            'client_user_id' => 2,
            'role_id' => 2,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_role_user')->insert([
            'client_user_id' => 2,
            'role_id' => 3,
            'created_at' => Carbon::now(),
        ]);

        //client user 3
        DB::table('client_role_user')->insert([
            'client_user_id' => 3,
            'role_id' => 2,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_role_user')->insert([
            'client_user_id' => 3,
            'role_id' => 3,
            'created_at' => Carbon::now(),
        ]);
    }
}
