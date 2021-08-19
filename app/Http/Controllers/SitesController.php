<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Models\Proprietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SitesController extends Controller
{
    public function index()
    {
        return redirect('/imoveis');
    }

    public function getImoveis()
    {
        $imoveis = Imovel::with('proprietarios')->get();

        return view('imoveis.index', compact('imoveis'));
    }

    public function getImovel(Imovel $imovel)
    {
        return $imovel;
    }

    public function getProprietarios()
    {
        $proprietarios = Proprietario::with('imoveis')->get();

        return view('proprietarios.index', compact('proprietarios'));
    }

    public function getProprietario(Proprietario $proprietario)
    {
        return $proprietario;
    }

    public function uploadXML()
    {
        return view('upload');
    }

    public function storeXML(Request $request)
    {
        $request->validate(['xml' => 'required|mimes:application/xml,xml']);

        $uploaded = $this->uploadFile($request);

        if ($uploaded) {
            $source = storage_path("app\\") . $uploaded;
            $file_content = file_get_contents($source);

            $string = str_replace('Unicode', 'UTF-8', mb_convert_encoding($file_content, "UTF-8", "Unicode"));

            $xml = simplexml_load_string($string);

            $this->saveDataInDB($xml);
        } else {
            echo "Arquivo não encontrado, em " . storage_path("app\\") . $uploaded;
        }

        return redirect('/');
    }

    protected function saveDataInDB($xml)
    {
        $imovel = null;
        $proprietario = null;
        foreach ($xml->Imoveis->children() as $imovelXML) {
            Storage::put("public\images\\$imovelXML->nomeArquivo", base64_decode($imovelXML->conteudoArquivo));

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

            foreach ($imovelXML->Proprietarios->children() as $proprietarioXML) {
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

                $result = $proprietario->imoveis()->where('imovel_id', $imovel->id)->first();

                if (!$result) {
                    DB::table('imovel_proprietario')->insert([
                        'imovel_id'       => $imovel->id,
                        'proprietario_id' => $proprietario->id,
                    ]);
                }
            }
        }
    }

    protected function uploadFile(Request $request)
    {
        if ($request->file('xml')) {
            $name      = date('YmdHms');
            $extension = $request->xml->extension();
            $uploaded  = $request->xml->storeAs('public\xml', "$name.$extension");

            return $uploaded;
        } else {
            return redirect()->back()->with('errors', ['Falha ao fazer upload'])->withInput();
        }
    }
}
