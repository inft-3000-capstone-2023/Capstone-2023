<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_image')->insert([
            'event_id' => 1,
            'image_id' => 1,
            'created_at' => Carbon::now(),
        ]);

        DB::table('event_image')->insert([
            'event_id' => 2,
            'image_id' => 2,
            'created_at' => Carbon::now(),
        ]);

        DB::table('event_image')->insert([
            'event_id' => 3,
            'image_id' => 3,
            'created_at' => Carbon::now(),
        ]);
    }
}
