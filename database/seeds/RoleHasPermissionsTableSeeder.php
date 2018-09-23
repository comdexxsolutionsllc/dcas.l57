<?php

use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function run()
    {
        foreach ($role_has_permissions = json_decode(\File::get(database_path('schema/role_has_permissions.json')), true) as $index => $rhp) {
            $role = \App\Models\General\Role::whereName($rhp['role'])->first();
            if ($rhp["permission"] === "*") {
                $role->givePermissionTo($permissions = \App\Models\General\Permission::pluck('name')->toArray());
            }
        }
    }
}
