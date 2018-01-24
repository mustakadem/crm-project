<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required','string'
            ],
            'surnames' => [
                'required','string'
            ],
            'address' => [
                'required','string'
            ],
            'movil' => [
                'required','numeric'
            ],
            'email' => [
              'required','email'
            ],
            'company' => [
                'string'
            ],
            'job_title' => [
                'string'
            ],
            'notes' => [
                'string'
            ],
        ];
    }

    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe estar solo compuesto por letras',
            'surnames.required' => 'Los apellidos son requeridos',
            'surnames.string' => 'Los apellidos deben estar solo compuestos por letras',
            'address.required' => 'La direccion es requerida',
            'address.string' => 'La direccion debe estar compuesta por letras y numeros',
            'email.required' => 'El email es requerido',
            'email.email' => 'Debes introducir un email correcto',
            'movil.required' => 'El numero de movil es requerido',
            'movil.numeric' => 'El numero movil debe estar compuesta solo por numeros',
            'number.numeric' => 'El numero fijo debe estar compuesta solo por numeros',
            'company.string' => 'El nombre de la Compania debe estar compuesta por letras o letras y numeros',
            'job_title.string' => 'El puesto de trabajo debe estar compuesta por letras o letras y numeros',
            'notes.string' => 'Las notas sobre el cliente deben estar compuesta por letras o letras y numeros'
        ];
    }
}
