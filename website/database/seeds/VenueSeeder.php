<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VenueSeeder extends Seeder
{
    public function run()
    {
        $venues = [
            [
                'name'           => 'Royal Lytham & St Annes Golf Club',
                'phone'          => '01253 724206',
                'venue_url'      => 'https://www.royallytham.org',
                'golf_guide_url' => 'https://www.golfcourseguide.co.uk/royal-lytham',
                'dummy'          => 0,
            ],
            [
                'name'           => 'Wentworth Club',
                'phone'          => '01344 842201',
                'venue_url'      => 'https://www.wentworthclub.com',
                'golf_guide_url' => 'https://www.golfcourseguide.co.uk/wentworth',
                'dummy'          => 0,
            ],
            [
                'name'           => 'The Belfry',
                'phone'          => '01675 470301',
                'venue_url'      => 'https://www.thebelfry.com',
                'golf_guide_url' => 'https://www.golfcourseguide.co.uk/the-belfry',
                'dummy'          => 0,
            ],
            [
                'name'           => 'Moortown Golf Club',
                'phone'          => '0113 268 6521',
                'venue_url'      => 'https://www.moortown-gc.co.uk',
                'golf_guide_url' => 'https://www.golfcourseguide.co.uk/moortown',
                'dummy'          => 0,
            ],
            [
                'name'           => 'Formby Golf Club',
                'phone'          => '01704 872164',
                'venue_url'      => 'https://www.formbygolfclub.co.uk',
                'golf_guide_url' => 'https://www.golfcourseguide.co.uk/formby',
                'dummy'          => 0,
            ],
        ];

        foreach ($venues as $venue) {
            DB::table('venues')->insert(array_merge($venue, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
