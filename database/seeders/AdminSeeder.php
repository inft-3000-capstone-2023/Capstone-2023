<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'email' => 'clients@example.com',
            'password' => '$2a$12$GtfxvABum.ak7D2tz4W.luzQRz1NzPLmRWJv6oV9jXagujrPG3Egu',
            'created_at' => Carbon::now(),
        ]);
    }
}
