<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'path' => 'public/images/FIN/event1',
            'alt_text' => 'client 1, event 1 image alt text',
            'description' => 'client 1, event 1 image description',
            'created_at' => Carbon::now(),
        ]);

        DB::table('images')->insert([
            'path' => 'public/images/Zwickers/event2',
            'alt_text' => 'client 2, event 2 image alt text',
            'description' => 'client 2, event 2 image description',
            'created_at' => Carbon::now(),
        ]);

        DB::table('images')->insert([
            'path' => 'public/images/HalifaxJazzFestival/event1',
            'alt_text' => 'client 3, event 3 image alt text',
            'description' => 'client 3, event 3 image description',
            'created_at' => Carbon::now(),
        ]);
    }
}
