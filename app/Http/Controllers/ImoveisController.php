<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImoveisController extends Controller
{
    public function index(Request $request)
    {
        $search = Imovel::with('proprietarios');

        if ($request->matricula) {
            $search->where('matricula', '=', $request->matricula);
        }

        if ($request->inscricao) {
            $search->where('lancamento', 'LIKE', $request->inscricao);
        }

        if ($request->dt_alteracao) {
            $search->where('updated_at', 'LIKE', "$request->dt_alteracao%");
        }

        if ($request->dt_cadastro) {
            $search->where('created_at', 'LIKE', "$request->dt_cadastro%");
        }

        $imoveis = $search->orderBy('updated_at', 'DESC')
            ->get();

        return response()->json($imoveis, Response::HTTP_OK);
    }

    public function getMatricula($matricula)
    {
        $imovel = Imovel::with('proprietarios')->where('matricula', '=', $matricula)->get();

        return response()->json($imovel, Response::HTTP_OK);
    }

    public function getInscricao($inscricao)
    {
        $imovel = Imovel::with('proprietarios')->where('inscricao', '=', $inscricao)->get();

        return response()->json($imovel, Response::HTTP_OK);
    }
}
