<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //customer 1
        DB::table('client_customer_preference')->insert([
            'client_customer_id' => 1,
            'preference_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_customer_preference')->insert([
            'client_customer_id' => 1,
            'preference_id' => 3,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_customer_preference')->insert([
            'client_customer_id' => 1,
            'preference_id' => 5,
            'created_at' => Carbon::now(),
        ]);

        //customer 2
        DB::table('client_customer_preference')->insert([
            'client_customer_id' => 2,
            'preference_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_customer_preference')->insert([
            'client_customer_id' => 2,
            'preference_id' => 2,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_customer_preference')->insert([
            'client_customer_id' => 2,
            'preference_id' => 3,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_customer_preference')->insert([
            'client_customer_id' => 2,
            'preference_id' => 4,
            'created_at' => Carbon::now(),
        ]);

        DB::table('client_customer_preference')->insert([
            'client_customer_id' => 2,
            'preference_id' => 5,
            'created_at' => Carbon::now(),
        ]);

        //customer 3
        DB::table('client_customer_preference')->insert([
            'client_customer_id' => 3,
            'preference_id' => 3,
            'created_at' => Carbon::now(),
        ]);

    }
}
