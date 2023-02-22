<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'email' => 'bob@example.com',
            'first_name' => 'Bob',
            'last_name' => 'Dylan',
            'password' => '$2a$12$KgJuIuYoFjzQcqOxvgRQH.xhwB3gJHqJyLgMAjtk.rb7hF.q7sMwK',
            'created_at' => Carbon::now(),
        ]);

        DB::table('customers')->insert([
            'email' => 'mark@example.com',
            'first_name' => 'Mark',
            'last_name' => 'Smith',
            'password' => '$2a$12$uib9xOhd7ozzVA3vOXZ.oOBbbqoMtMM0Oa/bLJfzekpKRWCnm1UPu',
            'created_at' => Carbon::now(),
        ]);

        DB::table('customers')->insert([
            'email' => 'sam@example.com',
            'first_name' => 'Sam',
            'last_name' => 'Singleton',
            'password' => '$2a$12$mK/FbBrFzsY8eAfp6YmHS.nOP99Ot15qgm0h/xKZoREGk/gM9DDoe',
            'created_at' => Carbon::now(),
        ]);
    }
}
