<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'client_customer_id' => 1,
            'event_id' => 1,
            'total' => 11.98, //two tickets at 5.99 each
            'number_tickets' => 2,
            'qr_code_string' => '1-1-2',
            'created_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'client_customer_id' => 2,
            'event_id' => 2,
            'total' => 6.99, //one ticket
            'number_tickets' => 1,
            'qr_code_string' => '2-2-1',
            'created_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'client_customer_id' => 3,
            'event_id' => 3,
            'total' => 0.00, //free
            'number_tickets' => 6,
            'qr_code_string' => '3-3-6',
            'created_at' => Carbon::now(),
        ]);
    }
}
