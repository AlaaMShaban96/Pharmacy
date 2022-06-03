<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class CreatePermissionRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            $roles=[
                ['name' => 'Super Admin','guard_name'=>'web'],
                ['name' => 'Admin','guard_name'=>'web'],
                ['name' => 'Moderator','guard_name'=>'web'],
                ['name' => 'User','guard_name'=>'web'],
            ];
            Role::insert($roles);

        });
    }
}
