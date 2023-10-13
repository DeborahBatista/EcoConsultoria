<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Http\Resources\UsuarioResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    public function index()
    {
        //$this->authorize('viewAny', Usuario::class); //Verifica a autorização para listar usuários.
        $usuarios = Usuario::all();
        return UsuarioResource::collection($usuarios);
    }

    public function store(StoreUsuarioRequest $request)
{
    //$this->authorize('create', Usuario::class); 

    $data = $request->all();
    $data['password'] = Hash::make($data['password']); // Criptografa a senha com Hash
    try {
        $usuario = Usuario::create($data);
        return response()->json(['message' => 'usuario inserido com sucesso', 'usuario' => new UsuarioResource($usuario)], 201);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Erro ao inserir o usuario', 'error' => $e->getMessage()], 500);
    }
}

    public function show(Usuario $usuario)
    {
        //$this->authorize('view', $usuario); //Verifica a autorização para visualizar um usuário.
        return new UsuarioResource($usuario);
    }

    public function update(Request $request, Usuario $usuario)
    {
        $usuario = $request->all();

        // Check if a new password has been provided and hash it if it has
        if (isset($usuario['password'])) {
            $usuario['password'] = Hash::make($usuario['password']);
        }

        try {
            $usuario = Usuario::create($usuario);
            return response()->json(['message' => 'usuario inserido com sucesso', 'usuario' => new UsuarioResource($usuario)], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao inserir o usuario', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy(Usuario $usuario)
    {
       // $this->authorize('delete', $usuario); //Verifica a autorização para excluir um usuário.

        $usuario->delete();
        return response(null, 204);
    }

    public function login(Request $request,  Usuario $usuario)
{
    // Verifica se o campo de senha está sendo enviado
    if ($request->has('password')) {
        $usuario = $request->only('email', 'password');
     

        // Verifica se o valor que está sendo atribuído é um objeto
        if (is_object($usuario)) {
            $usuario->password = Hash::make($usuario['password']);
           
        } else {
            // Erro: o valor que está sendo atribuído não é um objeto
        }

        // Verifica se o usuário existe no banco de dados
        if ($usuario = Usuario::where('email', $usuario['email'])->where('password', $usuario['password'])->first()) {
            // Autentica o usuário
            Auth::login($usuario);

            // Retorna uma mensagem de sucesso
            return response()->json(['message' => 'Login bem-sucedido'], 200);
        } else {
            // Retorna uma mensagem de erro
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }
    } else {
        // Erro: campo de senha não enviado
        return response()->json(['message' => 'Campo de senha não enviado'], 400);
    }
}



    public function logout()
    {
        Auth::logout();
        return response()->json(['mensage' => 'Logout bem-sucedido']);
 
    } 
}
