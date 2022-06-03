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
                ['name' => 'Admin','guard_name'=>'web'],
                ['name' => 'Moderator','guard_name'=>'web'],
                ['name' => 'User','guard_name'=>'web'],
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
