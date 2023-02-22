<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_customer')->insert([
            'customer_id' => 1,
            'client_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_customer')->insert([
            'customer_id' => 2,
            'client_id' => 2,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_customer')->insert([
            'customer_id' => 3,
            'client_id' => 3,
            'created_at' => Carbon::now(),
        ]);
    }
}
