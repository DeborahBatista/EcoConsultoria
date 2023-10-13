<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrdemDeServicoResource extends JsonResource
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
            'numero' =>$this->numero,
            'titulo' =>$this->titulo,
            'descricao' =>$this->descricao,
            'prioridade' =>$this->prioridade,
            'responsavel_id' =>$this->esponsavel_id,
            'data_inicio' =>$this->data_inicio,
            'data_fim' =>$this->data_fim,
            'status' =>$this->status,
        ];
    }
}
