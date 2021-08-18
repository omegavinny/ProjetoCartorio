<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Models\Proprietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;

class SitesController extends Controller
{
    public function index()
    {
        $imoveis = Imovel::with('proprietarios')->get();
        return view('index', compact('imoveis'));
    }

    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate(['xml' => 'required|mimes:application/xml,xml']);

        $nameFile     = null;
        $storage_path = "public\uploads";
        $upload       = null;

        if ($request->file('xml')) {
            $name      = date('Ymd');
            $extension = $request->xml->extension();
            $nameFile  = "$name.$extension";
            $upload    = $request->xml->storeAs($storage_path, $nameFile);
        } else {
            return redirect()->back()->with('errors', ['Falha ao fazer upload'])->withInput();
        }

        if ($upload) {
            $source = storage_path("app\\") . $upload;
            $file_content = file_get_contents($source);

            $string = str_replace('Unicode', 'UTF-8', mb_convert_encoding($file_content, "UTF-8", "Unicode"));

            $xml = simplexml_load_string($string);

            foreach($xml->Imoveis->children() as $imovelXML) {
                $imovel = null;
                $proprietario = null;
                Storage::put("public\images\\" . $imovelXML->nomeArquivo, base64_decode($imovelXML->conteudoArquivo));

                $imovel = Imovel::where('matricula', $imovelXML->Matricula)->first();

                if (!$imovel) {
                    $imovel = new Imovel();
                }

                $imovel->matricula       = $imovelXML->Matricula;
                $imovel->lancamento      = $imovelXML->Lancamento;
                $imovel->venda           = $imovelXML->dataVenda;
                $imovel->nome_arquivo    = $imovelXML->nomeArquivo;
                $imovel->caminho_arquivo = 'storage\images';

                $imovel->save();

                foreach($imovelXML->Proprietarios->children() as $proprietarioXML) {
                    $proprietario = null;

                    $proprietario = Proprietario::where([
                        ['tipo_documento', '=', $proprietarioXML->tipoDocumento],
                        ['documento', '=', $proprietarioXML->documento],
                    ])->first();

                    if (!$proprietario) {
                        $proprietario = new Proprietario();
                    }

                    $proprietario->nome = $proprietarioXML->descricaoDocumento;
                    $proprietario->tipo_documento = $proprietarioXML->tipoDocumento;
                    $proprietario->documento = $proprietarioXML->documento;
                    $proprietario->endereco = $proprietarioXML->endereco;
                    $proprietario->numero = $proprietarioXML->numero;
                    $proprietario->complemento = $proprietarioXML->complemento;
                    $proprietario->bairro = $proprietarioXML->bairro;
                    $proprietario->cep = $proprietarioXML->cep;
                    $proprietario->uf = $proprietarioXML->uf;
                    $proprietario->municipio = $proprietarioXML->municipio;
                    $proprietario->save();
                }
            }
        } else {
            echo "Arquivo não encontrado, em " . storage_path("app\\") . $upload;
        }

        return redirect('/');
    }
}
