<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Validación del formulario "Nueva Transacción".
 * Antes estaba dentro de store(); aquí queda ordenada y se puede reutilizar.
 */
class GuardarTransaccionRequest extends FormRequest
{
    /**
     * ¿Tiene permiso de hacer esto? Es distinto a si los datos son válidos.
     * Artisan lo genera en false (eso da 403). Va en true porque todavía
     * no hay login de usuarios.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'comercio_id' => 'required|exists:comercios,id',
            'cliente_nombre' => 'required|string|max:255',
            'monto' => 'required|numeric|min:0.01',
        ];
    }

    /**
     * Mensajes propios, en español.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'cliente_nombre.required' => 'Debes indicar el nombre del cliente.',
            'monto.required' => 'Debes indicar un monto.',
            'monto.numeric' => 'El monto debe ser un número.',
            'monto.min' => 'El monto debe ser mayor a cero.',
        ];
    }

    /**
     * Nombres bonitos para los mensajes que no personalicé arriba.
     * Así se lee "comercio" y no "comercio_id".
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'cliente_nombre' => 'nombre del cliente',
            'monto' => 'monto de la transacción',
            'comercio_id' => 'comercio',
        ];
    }
}
