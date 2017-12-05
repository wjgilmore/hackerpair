<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

use App\User;
use App\ZipCode;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::statement( 'TRUNCATE users' );

        // Build array of titles
        $titles = ['PHP Developer', 'Ruby Developer', 'JavaScript Maniac', 'UX Expert'];

        $faker = Faker::create();

        for($x=0; $x<100; $x++) {

            $zipCode = ZipCode::whereNotNull('state_id')->inRandomOrder()->first();

            $timezones = [
                'America/New_York',
                'America/Chicago',
                'America/Denver',
                'America/Phoenix',
                'America/Los_Angeles',
                'America/Anchorage',
                'America/Adak',
                'Pacific/Honolulu'
            ];

            $timezone = $timezones[array_rand($timezones)];

            $user = User::create([
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'email'      => $faker->email,
                'city'       => $faker->city,
                'state_id'   => $zipCode->state_id,
                'zip'        => $zipCode->zip,
                'timezone'   => $timezone,
                'title'      => $titles[array_rand($titles)],
                'lat'        => $zipCode->lat,
                'lng'        => $zipCode->lng,
                'bio'        => $faker->paragraphs(1, true),
                'password'   => bcrypt('hacker')
            ]);


        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
