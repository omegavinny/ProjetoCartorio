<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use Illuminate\Http\Request;

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

        return view('imoveis.index', compact('imoveis'));
    }
}
