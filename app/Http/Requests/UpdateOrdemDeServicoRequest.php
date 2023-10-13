<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrdemDeServicoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'numero' => 'string',
            'titulo' => 'string',
            'descricao' => 'string',
            'prioridade' => 'string',
            'responsavel_id' => 'exists:usuarios,id',
            'data_inicio' => 'date',
            'data_fim' => 'date',
            'status' => 'boolean',
        ];
    }
}
