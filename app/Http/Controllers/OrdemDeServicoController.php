<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ordem_Servico;
use App\Http\Requests\StoreOrdemDeServicoRequest;
use App\Http\Requests\UpdateOrdemDeServicoRequest;
use App\Http\Resources\OrdemDeServicoResource;

class OrdemDeServicoController extends Controller

{

    public function index()
    {
        $ordemServico = Ordem_Servico::all();
        return OrdemDeServicoResource::collection($ordemServico);
    }

    public function store(Request $request)
    {
        try {
            $ordemServico = Ordem_Servico::create($request->all());
            return response()->json(['message' => 'Ordem de Servico inserida com sucesso', 'ordemServico' => new OrdemDeServicoResource($ordemServico)], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao inserir Ordem de Servico', 'error' => $e->getMessage()], 500);
        }
    }

    public function show(Ordem_Servico $ordemServico)
    {
        return new OrdemDeServicoResource($ordemServico);
    }

    public function update(Request $request, Ordem_Servico $ordemServico)
{
    if (!$ordemServico) {
        return response()->json(['message' => 'Ordem de Servico não encontrada'], 404);
    }

    try {
        $ordemServico->update($request->all());
        return response()->json(['message' => 'Ordem de Servico atualizada com sucesso', 'ordemServico' => new OrdemDeServicoResource($ordemServico)], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Erro ao atualizar Ordem de Servico', 'error' => $e->getMessage()], 500);
    }
}

    public function destroy(Ordem_Servico $ordemServico)
    {
        $ordemServico->delete();
        return response(null, 204);
    }
}