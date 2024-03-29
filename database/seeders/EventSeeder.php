<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'client_id' => 1,
            'event_title' => 'Opening Night Film BROTHER',
            'event_description' => 'Join us at the Atlantic International Film Festival as we kick off our first screening of 2022 with the film "Brother".',
            'max_tickets_per_customer' => 5,
            'date_time' => Carbon::now()->addYears(1),
            'end_time' => Carbon::now()->addYears(1)->addHours(2),
            'time_zone' => 'AST',
            'venue' => 'NSCC IT Campus',
            'street' => '5885 Leeds St',
            'city' => 'Halifax',
            'province' => 'NS',
            'postal_code' => 'B3K 4M2',
            'ticket_price' => 5.99,
            'created_at' => Carbon::now(),
        ]);

        DB::table('events')->insert([
            'client_id' => 1,
            'event_title' => 'HUNTING IN PACKS',
            'event_description' => 'Screening night of the Feature Program: "HUNTING IN PACKS"',
            'max_tickets_per_customer' => 2,
            'date_time' => Carbon::now()->addWeeks(6),
            'end_time' => Carbon::now()->addWeeks(6)->addHours(3),
            'time_zone' => 'AST',
            'venue' => 'NSCC IT Campus',
            'street' => '5885 Leeds St',
            'city' => 'Halifax',
            'province' => 'NS',
            'postal_code' => 'B3K 4M2',
            'ticket_price' => 10.99,
            'created_at' => Carbon::now(),
        ]);

        DB::table('events')->insert([
            'client_id' => 1,
            'event_title' => 'SO MUCH TENDERNESS screening',
            'event_description' => 'Screening night of the Documentary Program: "SO MUCH TENDERNESS"',
            'max_tickets_per_customer' => 2,
            'date_time' => Carbon::now()->addMonth(1),
            'end_time' => Carbon::now()->addMonth(1)->addHours(2),
            'time_zone' => 'AST',
            'venue' => 'NSCC IT Campus',
            'street' => '5885 Leeds St',
            'city' => 'Halifax',
            'province' => 'NS',
            'postal_code' => 'B3K 4M2',
            'ticket_price' => 7.99,
            'created_at' => Carbon::now(),
        ]);

        DB::table('events')->insert([
            'client_id' => 1,
            'event_title' => 'MY NAME IS ANDREA',
            'event_description' => 'Screening night of the Documentary Program: "MY NAME IS ANDREA"',
            'max_tickets_per_customer' => 3,
            'date_time' => Carbon::now()->addDays(6),
            'end_time' => Carbon::now()->addDays(6)->addHours(2),
            'time_zone' => 'AST',
            'venue' => 'NSCC IT Campus',
            'street' => '5885 Leeds St',
            'city' => 'Halifax',
            'province' => 'NS',
            'postal_code' => 'B3K 4M2',
            'ticket_price' => 20.99,
            'created_at' => Carbon::now(),
        ]);

        DB::table('events')->insert([
            'client_id' => 2,
            'event_title' => 'Arthur Lloy Exhibition',
            'event_description' => "Arthur was born in Melville Cove on the Northwest Arm in Halifax. He showed a talent for drawing and painting while he was young and later went to study at Saint Mary’s University and the Nova Scotia College of Art and Design in Halifax. While Arthur continued to paint, he worked in the Dockyard in order to support his family. Like so many of the young Canadian artists who came to maturity in the middle years of the 20th century, Arthur was strongly influenced by the members of the Group of Seven, with their emphasis on painting the rugged Canadian landscape en-plein-air, like the French Impressionists.",
            'max_tickets_per_customer' => 2,
            'date_time' => Carbon::now()->addYears(1),
            'end_time' => Carbon::now()->addYears(1)->addHours(1),
            'time_zone' => 'AST',
            'venue' => 'NSCC IT Campus',
            'street' => '5885 Leeds St',
            'city' => 'Halifax',
            'province' => 'NS',
            'postal_code' => 'B3K 4M2',
            'ticket_price' => 6.99,
            'created_at' => Carbon::now(),
        ]);

        DB::table('events')->insert([
            'client_id' => 3,
            'event_title' => 'TD Main Stage',
            'event_description' => "The TD Main Stage on the Halifax waterfront is the heart of the TD Halifax Jazz Festival with free concerts EVERY DAY 12pm - 3pm for fans of all ages! The FREE music offerings start at the waterfront daily from Wednesday, July 13th through till Sunday, July 17th. Minors are required to be accompanied by their legal guardian (ID Required), download the guardianship form",
            'max_tickets_per_customer' => 10,
            'date_time' => Carbon::now()->addYears(1),
            'end_time' => Carbon::now()->addYears(1)->addHours(4),
            'time_zone' => 'AST',
            'venue' => 'NSCC IT Campus',
            'street' => '5885 Leeds St',
            'city' => 'Halifax',
            'province' => 'NS',
            'postal_code' => 'B3K 4M2',
            'ticket_price' => 0.00,
            'created_at' => Carbon::now(),
        ]);
    }
}
