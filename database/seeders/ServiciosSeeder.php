<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('servicios')->insert([
            [
                'nombre' => 'Servicio de Monitoreo',
                'descripcion' => 'Monitoreo 24/7 de las instalaciones.',
                'precio' => 1000.00,
                'disponible' => true,
                'fecha_inicio' => '2024-01-01',
                'fecha_fin' => '2024-12-31',
            ],
            [
                'nombre' => 'Análisis de Riesgos',
                'descripcion' => 'Evaluación de riesgos y amenazas potenciales.',
                'precio' => 500.00,
                'disponible' => true,
                'fecha_inicio' => '2024-02-01',
                'fecha_fin' => '2024-07-31',
            ],
            [
                'nombre' => 'Consultoría en Seguridad',
                'descripcion' => 'Asesoramiento en seguridad física y digital.',
                'precio' => 2000.00,
                'disponible' => false,
                'fecha_inicio' => '2024-03-01',
                'fecha_fin' => '2024-09-30',
            ],
            [
                'nombre' => 'Capacitación en Seguridad',
                'descripcion' => 'Cursos de capacitación para el personal.',
                'precio' => 750.00,
                'disponible' => true,
                'fecha_inicio' => '2024-04-01',
                'fecha_fin' => '2024-08-31',
            ],
        ]);
    }
}
