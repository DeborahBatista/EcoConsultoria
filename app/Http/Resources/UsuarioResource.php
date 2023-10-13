<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nome' =>$this->nome,
            'password' =>$this->password,
            'grupo' =>$this->grupo->nome, //Acessa a relação com a tabela grupo e pega o campo nome.
            'setor' =>$this->setor,
            'email' =>$this->email,
            'telefone' =>$this->telefone,
        ];
    }
}
