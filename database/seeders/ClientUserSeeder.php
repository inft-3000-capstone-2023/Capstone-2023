<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_users')->insert([
            'client_id' => 1,
            'user_id' => 6,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_users')->insert([
            'client_id' => 2,
            'user_id' => 7,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_users')->insert([
            'client_id' => 3,
            'user_id' => 8,
            'created_at' => Carbon::now(),
        ]);

    }
}
