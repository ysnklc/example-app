<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'Türker Jöntürk',
            'since' => '2020-10-12',
            'revenue' => 550.0
        ]);

        Customer::create([
            'name' => 'Yasin Kılıç',
            'since' => '2022-01-05',
            'revenue' => 470.0
        ]);

        Customer::create([
            'name' => 'Ahmet Yeşil',
            'since' => '2021-11-08',
            'revenue' => 850.0
        ]);
    }
}
