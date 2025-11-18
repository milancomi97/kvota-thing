<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run()
    {
        $tipovi = [
            'svadba' => ['Kruna (1)', '2025-09-10'],
            'krstenje' => ['Kruna (2)', '2025-08-15'],
            'punoletstvo' => ['Kruna (3)', '2025-10-01'],
        ];
//
//        foreach ($tipovi as $tip => [$naziv, $datum]) {
//            Event::updateOrCreate(
//                ['naziv' => $naziv],
//                [
//                    'tip' => $tip,
//                    'datum' => $datum,
//                    'status' => 'placeno',
//                    'upload_token' => Str::uuid(),
//                    'event_content' => "Dobrodošli na $naziv 🎉 Slobodno uploadujte fotografije i uživajte!",
//                ]
//            );
//        }

        Event::updateOrCreate(
            ['naziv' => 'Kruna'],
            [
                'tip' => 'krstenje',
                'datum' => '2025-08-20',
                'status' => 'placeno',
                'upload_token' => '8994ce99-a171-470b-bd2f-59889d73f22c',
                'event_content' => "Dobrodošli na krštenje 🎉 Slobodno uploadujte fotografije i uživajte!",
                'moderator_id'=>User::where('email','jelenavukvujisic@gmail.com')->first()->id,
                'event_code'=>'1122',
                'display_enabled'=>true
            ]
        );

    }
}
