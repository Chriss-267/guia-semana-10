<?php

namespace Database\Seeders;

use App\Models\Comercio;
use Illuminate\Database\Seeder;

class ComercioSeeder extends Seeder
{
    /**
     * Datos de ejemplo usados en todas las guías de Semana 6-8:
     * - Café Amanecer: comercio CON transacciones (uno Completada, uno Iniciada).
     * - Ferretería El Tornillo: comercio SIN transacciones (para probar @empty).
     */
    public function run(): void
    {
        $cafeAmanecer = Comercio::create([
            'nombre_comercio' => 'Café Amanecer',
            'rubro' => 'Restaurante',
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

        Comercio::create([
            'nombre_comercio' => 'Ferretería El Tornillo',
            'rubro' => 'Ferretería',
            'telefono' => '2222-5678',
        ]);

        // Comercio adicional para tener más variedad al probar la interfaz.
        $pupuseria = Comercio::create([
            'nombre_comercio' => 'Pupusería Doña Marta',
            'rubro' => 'Restaurante',
            'telefono' => '2222-9012',
        ]);

        $pupuseria->transacciones()->create([
            'monto' => 8.00,
            'cliente_nombre' => 'Carlos Ramírez',
            'estado' => 'Fallida',
        ]);
    }
}
