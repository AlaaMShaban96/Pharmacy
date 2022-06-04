<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CurrencySeeder;
use Database\Seeders\DepartmentSeeder;
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
        $this->call(CurrencySeeder::class);
        $this->call(CreatePermissionRolesSeeder::class);
        $this->call(DepartmentSeeder::class);


    }
}
