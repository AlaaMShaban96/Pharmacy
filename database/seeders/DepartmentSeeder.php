<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Department::whereNotNull('id')->delete();
            $currencies=[
                ['name' => 'الادارة','d_code'=>"MAAG",'n_code'=>"MAAG"],
                ['name' => 'التسويق','d_code'=>"MARK",'n_code'=>"MARK"],
            ];
            Department::insert($currencies);

        });
    }
}
