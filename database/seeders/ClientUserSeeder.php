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
            'email' => 'client1user1@example.com',
            'password' => '$2a$12$Ffqgyj1SIPpJULcPgBlksu5bnHEtWXFwQdqeNcnV0tBK9Gg0rkJNy',
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_users')->insert([
            'client_id' => 2,
            'email' => 'client2user1@example.com',
            'password' => '$2a$12$noc95arSzRmlXS.477GE4OCVA0OoRUSg932Lr3sFhlcqZ22RDCmqq',
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_users')->insert([
            'client_id' => 3,
            'email' => 'client3user1@example.com',
            'password' => '$2a$12$p3cHaT4saWQohOFwSU6mEu6Ump27BaR854gibE5k97ty7hBjAz4nC',
            'created_at' => Carbon::now(),
        ]);

    }
}
