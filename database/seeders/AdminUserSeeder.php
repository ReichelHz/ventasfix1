<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Asegúrate de que tu modelo se llame User
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'rut' => '11111111-1', // ejemplo
            'nombre' => 'Administrador',
            'apellido' => 'VentasFix',
            'email' => 'admin@ventasfix.cl',
            'password' => Hash::make('admin123'), // contraseña inicial
        ]);
    }
}
