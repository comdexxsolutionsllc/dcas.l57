<?php

use App\Models\General\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function run()
    {
        foreach ($permissions = json_decode(\File::get(database_path('schema/permissions.json')), true) as $index => $permission) {
            Permission::create([
                'name'       => $permission['name'],
                'guard_name' => 'web',
            ]);
        }
    }
}
