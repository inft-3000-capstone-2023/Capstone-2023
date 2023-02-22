<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            ClientSeeder::class,
            EventSeeder::class,
            ImageSeeder::class,
            EventImageSeeder::class,
            CustomerSeeder::class,
            ClientCustomerSeeder::class,
            PreferenceSeeder::class,
            CustomerPreferenceSeeder::class,
            ReviewSeeder::class,
            TransactionSeeder::class,
            RoleSeeder::class,
            TokenSeeder::class,
            RoleTokenSeeder::class,
            ClientUserSeeder::class,
            ClientRoleUserSeeder::class,
            AdminSeeder::class
        ]);

    }
}
