<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CompileZipCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hackerpair:compile_zip_codes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates unified zip code data from multiple sources';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * HT: https://stackoverflow.com/questions/6814760/php-using-explode-function-to-assign-values-to-an-associative-array
     * HT: https://stackoverflow.com/questions/19347005/how-can-i-explode-and-trim-whitespace
     *
     * @return mixed
     */
    public function handle()
    {

        $zipArray = [];
        $zipArray2 = [];
        $compiledArray = [];

        $fieldsFirst = ['zip', 'lat', 'lng'];
        $fieldsSecond = ['zip', 'city', 'state'];

        // Dump first zip code file to array

        if (! file_exists(database_path() . "/seeds/data/zip_code_coordinates.csv")) {

            if (! file_exists(database_path() . "/seeds/data")) {
                mkdir(database_path() . "/seeds/data", 0777, true);
            }

            file_put_contents(database_path() . "/seeds/data/zip_code_coordinates.csv", fopen("https://gist.githubusercontent.com/erichurst/7882666/raw/5bdc46db47d9515269ab12ed6fb2850377fd869e/US%2520Zip%2520Codes%2520from%25202013%2520Government%2520Data", 'r'));

        }

        $data = file(database_path() . '/seeds/data/zip_code_coordinates.csv');

        foreach($data as $line)
        {
            $blah = array_combine($fieldsFirst, array_map('trim', explode(",", $line)));
            $zipArray[] = $blah;
        }

        // Dump second zip code file to array

        if (! file_exists(database_path() . "/seeds/data/free-zipcode-database.csv")) {

            file_put_contents(database_path() . "/seeds/data/free-zipcode-database_temp.csv", fopen("http://federalgovernmentzipcodes.us/free-zipcode-database-Primary.csv", 'r'));

            $fields = [];

            if (($handle = fopen(database_path() . "/seeds/data/free-zipcode-database_temp.csv", "r")) !== FALSE) {
                $fields = [];
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                    $fields[] = implode(",", [$data[0], $data[2], $data[3]]);

                }
                fclose($handle);

                file_put_contents(database_path() . "/seeds/data/free-zipcode-database.csv", implode(PHP_EOL, $fields));

                unlink(database_path() . "/seeds/data/free-zipcode-database_temp.csv");

            }

        }

        $data = file(database_path() . '/seeds/data/free-zipcode-database.csv');

        foreach($data as $line)
        {

            $tmp = explode(",", $line);

            $zipArray2[trim($tmp[0])] =  array_combine($fieldsSecond, array_map('trim', explode(",", $line)));

        }

        // Now compile everything

        foreach ($zipArray as $zip)
        {

            $city = NULL;
            $state = NULL;

            if (array_key_exists($zip['zip'], $zipArray2)) {
                $city = $zipArray2[$zip['zip']]['city'];
                $state = $zipArray2[$zip['zip']]['state'];


                $compiledArray[] = [
                    'zip' => $zip['zip'],
                    'lat' => $zip['lat'],
                    'lng' => $zip['lng'],
                    'city' => ucfirst(strtolower($city)),
                    'state' => $state
                ];

            }

        }

        $fh = fopen(database_path() . '/seeds/data/hackerpair_zips.csv', 'w');

        foreach ($compiledArray as $row) {
            fputcsv($fh, $row);
        }

        fclose($fh);

    }
}
