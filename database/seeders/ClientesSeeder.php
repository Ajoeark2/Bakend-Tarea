<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'nombre' => 'Juan Pérez',
                'correo_electronico' => 'juan.perez@example.com',
                'telefono' => '555-1234',
                'direccion' => 'Calle Falsa 123',
                'fecha_nacimiento' => '1985-06-15',
                'numero_documento' => '12345678A',
                'tipo_documento' => 'DNI',
                'activo' => true,
            ],
            [
                'nombre' => 'María García',
                'correo_electronico' => 'maria.garcia@example.com',
                'telefono' => '555-5678',
                'direccion' => 'Avenida Siempre Viva 742',
                'fecha_nacimiento' => '1990-07-22',
                'numero_documento' => '87654321B',
                'tipo_documento' => 'DNI',
                'activo' => true,
            ],
            [
                'nombre' => 'Carlos López',
                'correo_electronico' => 'carlos.lopez@example.com',
                'telefono' => '555-9876',
                'direccion' => 'Calle del Sol 45',
                'fecha_nacimiento' => '1982-11-30',
                'numero_documento' => '23456789C',
                'tipo_documento' => 'Pasaporte',
                'activo' => false,
            ],
            [
                'nombre' => 'Ana Ruiz',
                'correo_electronico' => 'ana.ruiz@example.com',
                'telefono' => '555-6789',
                'direccion' => 'Plaza Mayor 1',
                'fecha_nacimiento' => '1978-04-12',
                'numero_documento' => '98765432D',
                'tipo_documento' => 'DNI',
                'activo' => true,
            ],
        ]);
    }
}
