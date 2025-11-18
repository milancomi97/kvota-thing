<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'milan.dimitrijevic@codegalerija.rs'],
            [
                'name' => 'Milan Dimitrijević',
                'password' => Hash::make('test1234'),
                'role_id' => 1, // pretpostavimo da je 1 = administrator
            ]
        );
        User::updateOrCreate(
            ['email' => 'jelenavukvujisic@gmail.com'],
            [
                'name' => 'Jelena Vujisic',
                'password' => Hash::make('test1234'),
                'role_id' => 2,
            ]
        );
        User::updateOrCreate(
            ['email' => 'dusan.jovanovic@codegalerija.rs'],
            [
                'name' => 'Dušan Jovanović',
                'password' => Hash::make('test1234'),
                'role_id' => 1,
            ]
        );


        User::updateOrCreate(
            ['email' => 'milancomi96@gmail.com'],
            [
                'name' => 'Test slavljenik',
                'password' => Hash::make('test1234'),
                'role_id' => 2,
            ]
        );
    }
}
