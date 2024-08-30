<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ClientesServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes_servicios')->insert([
            [
                'cliente_id' => 1, // Corrección aquí
                'servicio_id' => 1,
                'fecha_asignacion' => Carbon::now()->format('Y-m-d'), // Utiliza la fecha actual
            ],
            [
                'cliente_id' => 1, // Corrección aquí
                'servicio_id' => 2,
                'fecha_asignacion' => Carbon::now()->format('Y-m-d'),
            ],
            [
                'cliente_id' => 2, // Corrección aquí
                'servicio_id' => 3,
                'fecha_asignacion' => Carbon::now()->format('Y-m-d'),
            ],
            [
                'cliente_id' => 3, // Corrección aquí
                'servicio_id' => 4,
                'fecha_asignacion' => Carbon::now()->format('Y-m-d'),
            ],
            [
                'cliente_id' => 4, // Corrección aquí
                'servicio_id' => 1,
                'fecha_asignacion' => Carbon::now()->format('Y-m-d'),
            ],
        ]);
    }
}
