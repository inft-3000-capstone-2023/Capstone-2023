<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //token 1
        DB::table('role_token')->insert([
            'role_id' => 1,
            'token_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('role_token')->insert([
            'role_id' => 2,
            'token_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        //token 2
        DB::table('role_token')->insert([
            'role_id' => 4,
            'token_id' => 2,
            'created_at' => Carbon::now(),
        ]);

        //token 3
        DB::table('role_token')->insert([
            'role_id' => 1,
            'token_id' => 3,
            'created_at' => Carbon::now(),
        ]);

        DB::table('role_token')->insert([
            'role_id' => 2,
            'token_id' => 3,
            'created_at' => Carbon::now(),
        ]);

        DB::table('role_token')->insert([
            'role_id' => 3,
            'token_id' => 3,
            'created_at' => Carbon::now(),
        ]);


    }
}
