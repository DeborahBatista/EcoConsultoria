<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrdemDeServicoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'numero' => 'required|interger',
            'titulo' => 'required|string',
            'status' => 'required|boolean',
        ];
    }
}
