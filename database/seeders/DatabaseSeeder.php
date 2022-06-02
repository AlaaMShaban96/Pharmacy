<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CreatePermissionRolesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(CreatePermissionRolesSeeder::class);

    }
}
