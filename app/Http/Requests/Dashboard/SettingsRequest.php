<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingsRequest extends FormRequest
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
                    'title' => 'required|max:100',
                    'image' => ['image','mimes:jpeg,jpg,png,gif','max:2048',Rule::dimensions()->maxWidth(400)->maxHeight(400)],
                ];
            case 'PUT':
                return [
                    'title' => 'required|max:100',
                    'image' => ['image','mimes:jpeg,jpg,png,gif','max:2048',Rule::dimensions()->maxWidth(400)->maxHeight(400)],
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
            'title' => 'Título',
            'image' => 'Imagen',
        ];
    }
}
