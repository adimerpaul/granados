<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 
        * Roles
        *
        * Gerencia->id = 1
        * Logistica->id = 2
        * Contabilidad->id = 3
        * Residente de obra->id = 4
        * Administrador de almacen->id = 5 
        */

        $users = [
            ['name' => 'Gerencia', 'email' => 'gerencia@gmail.com', 'password' => Hash::make('123456789'), 'role_id' => 1, 'work_id' => null,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Logistica', 'email' => 'logistica@gmail.com', 'password' => Hash::make('123456789'), 'role_id' => 2, 'work_id' => null,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Contabilidad', 'email' => 'contabilidad@gmail.com', 'password' => Hash::make('123456789'), 'role_id' => 3, 'work_id' => null,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Julio', 'email' => 'julio.obra@gmail.com', 'password' => Hash::make('123456789'), 'role_id' => 4, 'work_id' => 1,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pedro', 'email' => 'pedro.obra@gmail.com', 'password' => Hash::make('123456789'), 'role_id' => 4, 'work_id' => 2,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Diego', 'email' => 'diego.obra@gmail.com', 'password' => Hash::make('123456789'), 'role_id' => 5, 'work_id' => 1,  'created_at' => now(), 'updated_at' => now()]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
