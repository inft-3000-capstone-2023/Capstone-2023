<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tokens')->insert([
            'client_id' => 1,
            'email' => 'armand@example.com',
            'token_string' => 'abc123',
            'created_at' => Carbon::now(),
        ]);

        DB::table('tokens')->insert([
            'client_id' => 2,
            'email' => 'sam@example.com',
            'token_string' => 'def456',
            'created_at' => Carbon::now(),
        ]);

        DB::table('tokens')->insert([
            'client_id' => 3,
            'email' => 'mark@example.com',
            'token_string' => 'ghi789',
            'created_at' => Carbon::now(),
        ]);
    }
}
