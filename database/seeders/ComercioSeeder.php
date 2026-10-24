<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ComercioSeeder extends Seeder
{
    /**
     * Datos de ejemplo usados en todas las guías de Semana 6-8.
     *
     * Semana 12: cada comercio se crea desde su dueño, así user_id se
     * llena solo. Ana: Café Amanecer (id 1). Carlos: Ferretería El
     * Tornillo (id 2), con una transacción para la matriz de pruebas.
     */
    public function run(): void
    {
        $ana = User::where('email', 'ana@taskboard.test')->firstOrFail();
        $carlos = User::where('email', 'carlos@taskboard.test')->firstOrFail();

        $cafeAmanecer = $ana->comercios()->create([
            'nombre_comercio' => 'Café Amanecer',
            'rubro' => 'Cafetería',
            'telefono' => '2222-1234',
        ]);

        $cafeAmanecer->transacciones()->createMany([
            [
                'monto' => 45.00,
                'cliente_nombre' => 'María López',
                'estado' => 'Completada',
            ],
            [
                'monto' => 12.50,
                'cliente_nombre' => 'Juan Pérez',
                'estado' => 'Iniciada',
            ],
        ]);

        $ferreteria = $carlos->comercios()->create([
            'nombre_comercio' => 'Ferretería El Tornillo',
            'rubro' => 'Ferretería',
            'telefono' => '2222-5678',
        ]);

        $ferreteria->transacciones()->create([
            'monto' => 30.00,
            'cliente_nombre' => 'Rosa Hernández',
            'estado' => 'Iniciada',
        ]);
    }
}
