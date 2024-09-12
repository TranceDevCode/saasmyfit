<?php

namespace Database\Seeders;

use App\Models\Management\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Gimnasio Pacific
        Company::create([
           'name' => 'Pacific',
           'slug' => 'pacific'
        ]);

        //Gimnasio SmartFit
        Company::create([
           'name' => 'SmartFit',
           'slug' => 'smart-fit'
        ]);

        //Gimnasios Energy
        Company::create([
            'name' => 'Energy',
            'slug' => 'energy'
        ]);
    }
}
