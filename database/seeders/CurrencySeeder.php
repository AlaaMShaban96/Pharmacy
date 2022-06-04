<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Currency::whereNotNull('id')->delete();
            $currencies=[
                ['name' => 'LD','price'=>1,'default'=>1],
                ['name' => 'USD','price'=>5.33,'default'=>0],
                ['name' => 'Euro','price'=>7,'default'=>0],
            ];
            Currency::insert($currencies);

        });
    }
}
