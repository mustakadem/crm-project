<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
                'required','string','min:4'
            ],
            'description' => [
                'required','min:10','max:255','string'
            ],
            'image' => [
                'required'
            ],
            'type_product' => [
                'in:servicio,bienes',
            ],
        'price' => [
            'numeric','required'
        ]
        ];
    }

    public function messages()
    {
        // Se espeficican los mensajes de validación para las reglas definidas
        // en el método rules de esta clase.
        return [
            'name.required' => 'El nombre del producto es requerido',
            'name.string' => 'El nombre debe contener letras',
            'name.min' => 'El nombre debe tener al menos 4 caracters',
            'description.required' => 'La Descripcion es requerida',
            'description.string' => 'La Descripcion debe de ser una cadena de texto',
            'description.min' =>'La descripcion debe contener minimo 4 caracteres',
            'description.max' =>'La descripcion debe contener maximo 255 caracteres',
            'image.required' => 'La Imagen es obligatoria',
            'price.numeric' => 'El precio debe ser un numero',
            'type_product.in' => 'Debes seleccionar un tipo de producto'
        ];
    }
}
