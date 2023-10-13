<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'string|max:255',
            'grupo_id' => 'integer',
            'setor' => 'string|max:255',
            'email' => 'email',
            'telefone' => 'string|max:20',
        ];
    }
}
