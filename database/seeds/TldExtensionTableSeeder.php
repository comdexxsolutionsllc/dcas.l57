<?php

use App\Models\Support\TldExtension;
use Illuminate\Database\Seeder;

class TldExtensionTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function run()
    {
        foreach ($tlds = json_decode(\File::get(database_path('schema/tld-info.json')), true) as $index => $tld) {
            TldExtension::create([
                'domain'      => $tld['domain'],
                'description' => $tld['description'],
                'type'        => $tld['type'],
            ]);
        }
    }
}
