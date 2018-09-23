<?php

use Illuminate\Database\Seeder;

class AirportTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function run()
    {
        DB::table(config('airports.table_name'))->delete();

        foreach ($airports = json_decode(\File::get(database_path('schema/airports.json')), true) as $index => $airport) {
            DB::table(\Config::get('airports.table_name'))->insert([
                'id'           => $index,
                'code'         => $airport['code'],
                'name'         => $airport['name'],
                'country_code' => $airport['country_code'],
            ]);
        }
    }
}
