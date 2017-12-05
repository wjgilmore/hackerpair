<?php

use Illuminate\Database\Seeder;

use App\State;
use App\ZipCode;

class ZipCodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::statement( 'TRUNCATE zip_codes' );

        // Process zip codes
        $zipFile = database_path() . '/seeds/data/hackerpair_zips.csv';

        $data = file($zipFile);

        foreach($data as $line)
        {

            list($zip, $latitude, $longitude, $city, $stateAbbreviation) = explode(",", trim($line));

            $state = State::where('abbreviation', $stateAbbreviation)->first();

            $zipCode = new ZipCode();
            $zipCode->zip = $zip;
            $zipCode->lat = $latitude;
            $zipCode->lng = $longitude;
            $zipCode->city = $city != "" ? str_replace('"', '', $city) : NULL;
            $zipCode->state_id = $state ? $state->id : NULL;

            $zipCode->save();

        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
