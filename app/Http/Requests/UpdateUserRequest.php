<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $path = $this->path();

        if (strpos($path, 'data')){
            $rules = [
                'name' => 'nullable|string|max:15|min:4',
                'surnames' => 'nullable|string|max:30|min:4',
                'movil' => 'nullable|numeric|min:6',
                'sector' => 'nullable|string|min:4',
                'website' => 'nullable|string|min:4'
            ];
        }elseif (strpos($path, 'password')){
            $rules = [
                'current_password' => 'required|string|min:6',
                'password' => 'required|string|min:6|confirmed',
            ];
        }

        return $rules;
    }
}
