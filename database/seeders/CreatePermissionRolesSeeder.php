<?php

namespace Database\Seeders;

use App\Models\User;
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
            Role::whereNotNull('id')->delete();
            $roles=[
                ['name' => 'Super Admin','guard_name'=>'web'],

                ['name' => 'Admin|Pro','guard_name'=>'web'],
                ['name' => 'Moderator|Pro','guard_name'=>'web'],
                ['name' => 'User|Pro','guard_name'=>'web'],

                // ['name' => 'Admin|War','guard_name'=>'web'],
                // ['name' => 'Moderator|War','guard_name'=>'web'],
                // ['name' => 'User|War','guard_name'=>'web'],

                // ['name' => 'Admin|supplier','guard_name'=>'web'],
                // ['name' => 'Moderator|supplier','guard_name'=>'web'],
                // ['name' => 'User|supplier','guard_name'=>'web'],
            ];
            $user=User::create([
                'name'=>'Super Admin',
                'email'=>'admin@email.com',
                'password'=>bcrypt('admin@email.com')
            ]);
            Role::insert($roles);
            $role=Role::where('name','like','%Super Admin%')->first();
            $user->assignRole($role);

        });
    }
}
