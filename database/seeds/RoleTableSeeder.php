<?php

use App\Models\General\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function run()
    {
        foreach ($roles = json_decode(\File::get(database_path('schema/roles.json')), true) as $index => $role) {
            Role::create([
                'name'       => $role['name'],
                'guard_name' => 'web',
            ]);
        }
    }
}
