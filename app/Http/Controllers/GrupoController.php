<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Http\Requests\StoreGrupoRequest;
use App\Http\Requests\UpdateGrupoRequest;
use App\Http\Resources\GrupoResource;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::all();
        return GrupoResource::collection($grupos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGrupoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrupoRequest $request)
    {
        try {
            $grupo = Grupo::create($request->all());
            return response()->json(['message' => 'Grupo inserido com sucesso', 'grupo' => new GrupoResource($grupo)], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao inserir o grupo', 'error' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        return new GrupoResource($grupo);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGrupoRequest  $request
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGrupoRequest $request, $id)
    {
        $grupo = Grupo::find($id);

        if (!$grupo) {
            return response()->json(['message' => 'Grupo não encontrado'], 404);
        }
    
        try {
            $grupo->update($request->all());
            return response()->json(['message' => 'Grupo atualizado com sucesso', 'grupo' => new GrupoResource($grupo)], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar o grupo', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        $grupo->delete();
        return response(null, 204);
    }
}