<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'grupo_id' => 'required|integer',
            'setor' => 'string|max:255',
            'email' => 'required|email',
            'telefone' => 'string|max:20',
        ];
    }
}
