<?php

namespace App\Http\Controllers;

use App\Models\Proprietario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProprietariosController extends Controller
{
    public function index()
    {
        $proprietarios = Proprietario::with('imoveis')->get();

        return response()->json($proprietarios, Response::HTTP_OK);
    }

    public function getId($id)
    {
        $proprietario = Proprietario::findOrFail($id);

        return response()->json($proprietario, Response::HTTP_OK);
    }

    public function getNome($nome)
    {
        $proprietario = Proprietario::where('nome', 'LIKE', $nome)->get();

        return response()->json($proprietario, Response::HTTP_OK);
    }

    public function getDocumentoTipo($tipo_documento)
    {
        $proprietarios = Proprietario::where('tipo_documento', '=', $tipo_documento)->get();

        return response()->json($proprietarios, Response::HTTP_OK);
    }

    public function getDocumentoValor($documento)
    {
        $proprietario = Proprietario::where('documento', '=', $documento)->get();

        return response()->json($proprietario, Response::HTTP_OK);
    }
}
