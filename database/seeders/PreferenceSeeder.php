<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('preferences')->insert([
            'name' => 'Preference 1',
            'description' => 'description for preference 1',
            'created_at' => Carbon::now(),
        ]);

        DB::table('preferences')->insert([
            'name' => 'Preference 2',
            'description' => 'description for preference 2',
            'created_at' => Carbon::now(),
        ]);

        DB::table('preferences')->insert([
            'name' => 'Preference 3',
            'description' => 'description for preference 3',
            'created_at' => Carbon::now(),
        ]);

        DB::table('preferences')->insert([
            'name' => 'Preference 4',
            'description' => 'description for preference 4',
            'created_at' => Carbon::now(),
        ]);

        DB::table('preferences')->insert([
            'name' => 'Preference 5',
            'description' => 'description for preference 5',
            'created_at' => Carbon::now(),
        ]);
    }
}
