<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Gerencia',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Logística',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Contabilidad',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Residente de obra',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Administrador de almacén', 'created_at' => now(), 'updated_at' => now()]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
