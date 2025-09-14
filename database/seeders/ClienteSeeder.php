<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Cliente::create([
        'rut_empresa' => '12345678-9',
        'rubro' => 'Tecnología',
        'razon_social' => 'Tech Solutions',
        'telefono' => '987654321',
        'direccion' => 'Calle Falsa 123',
        'nombre_contacto' => 'María López',
        'email_contacto' => 'contacto@techsolutions.cl',
    ]);
}

}
