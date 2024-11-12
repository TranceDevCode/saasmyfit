<?php

namespace Database\Seeders;

use App\Models\Management\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Roles por default semillas
        Role::create([
            'id' => 1,
            'name' => 'Administrador',
            'description' => 'Role para el Administrador del Gimnasio. Ya sea dueño, administrador o quien este a cargo del gimnasio o la red de gimnasios',
        ]);
    }
}
