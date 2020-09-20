<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
        switch($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'name' => 'required|string|max:70',
                    'last_name' => 'nullable|string|max:70',
                    'email' => 'required|email|unique:users|max:70',
                    'phone' => 'required|numeric',
                    'password' => 'required|min:5|max:30',
                    'image' => ['image','mimes:jpeg,jpg,png,gif','max:2048',Rule::dimensions()->maxWidth(550)->maxHeight(550)],
                ];
            case 'PUT':
                return [
                    'name' => 'required|string|max:70',
                    'last_name' => 'nullable|string|max:70',
                    'email' => 'required|email|max:70|unique:users,email,'.$this->id,
                    'phone' => 'required|numeric',
                    'password' => 'nullable|confirmed|min:5|max:30',
                    'password_confirmation' => 'nullable|min:5|max:30',
                    'image' => ['image','mimes:jpeg,jpg,png,gif','max:2048',Rule::dimensions()->maxWidth(550)->maxHeight(550)],
                ];
            case 'PATCH':
            default:break;
        }
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'last_name' => 'Apellido',
            'email' => 'Correo',
            'phone' => 'Teléfono',
            'image' => 'Imagen',
            'password' => 'Confirmar contraseña',
            'password_confirmation' => 'Contraseña nueva',
        ];
    }
}
