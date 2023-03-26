<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'company_name' => 'Atlantic International Film Festival',

            'description' => 'Atlantic International Film Festival is an eight-day celebration of film and media with regional and international talent. We come together for a shared love in stories that reflect the human condition through drama, comedy, action, and documentaries. It’s also a chance for filmmakers and fans to exchange thoughts on the creative process and technical aspects of movie making.
                                Alongside a full program of in-person screenings at Cineplex Park Lane, this year marks the return of events! Experience the glamour of our Opening Night Gala, Closing Night Party Atlantic Awards Ceremony and engaging Filmmaker Panels and Q&A’s. You can also look forward to the return of FIN Stream, an online festival featuring most of our Atlantic Canadian content!
                                Join cast and crew...fans and critics…and experience some of the finest immersive story-telling the east coast and beyond has to offer.',

            'logo_path' => 'public/images/1/logo.png',
            'created_at' => Carbon::now(),
        ]);

        DB::table('clients')->insert([
            'company_name' => "Zwickers Art Gallery",

            'description' => "Founded in 1886, this is the gallery's 131st year. We offer a wide range of painting, graphics and sculpture by a variety of talented local Canadian and International artists. The gallery also carries a good selection of antique maps, charts, and historical prints of Canada, in addition to Inuit and Aboriginal graphics and sculpture.
                                Zwicker's Gallery is qualified to offer expert valuation and appraisal services for works of art for insurance, donation, probate or family division purposes. Please contact the Director for further details or to make an appointment.",

            'logo_path' => 'public/images/2/logo.png',
            'created_at' => Carbon::now(),
        ]);

        DB::table('clients')->insert([
            'company_name' => 'Halifax Jazz Festival',

            'description' => 'Since 1987, HJF has organized a diverse range of musical and educational activities, including the annual Halifax Jazz Festival. The TD Halifax Jazz Festival, formerly known as the Atlantic Jazz Festival, is the oldest jazz festival and largest summer festival in Atlantic Canada. Designated a Hallmark Event by the Halifax Regional Municipality, the festival attracts up to 65,000 visitors, involves 400 volunteers and employs over 350 local musicians.
                                The Halifax Jazz Festival (HJF), formed as JazzEast Rising is a non-profit organization created in 1987 to present the first ever Halifax Jazz Festival (formerly known as the Atlantic Jazz Festival) in Nova Scotia, Canada.  As a registered charity, HJF has widened its horizons beyond the successful TD Halifax Jazz Festival to become involved, throughout the year, in a diverse range of musical and educational activities.',

            'logo_path' => 'public/images/3/logo.png',
            'created_at' => Carbon::now(),
        ]);
    }
}
