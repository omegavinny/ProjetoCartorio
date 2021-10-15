<?php

namespace App\Http\Controllers;

use App\Models\Imovel;
use App\Models\Proprietario;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UploadsController extends Controller
{
    public function index()
    {
        $uploads = Upload::all();

        return view('uploads.index', compact('uploads'));
    }

    public function create()
    {
        return view('uploads.create');
    }

    public function store(Request $request)
    {
        $request->validate(['xml' => 'required|mimes:application/xml,xml']);

        $file_name = $request->xml->getClientOriginalName();
        $file_path = 'public/files/xml';

        if (Storage::disk('local')->exists("/$file_path/$file_name")) {
            return redirect(route('uploads.index'))->with('warning', 'Arquivo já enviado!');
        }

        $uploaded  = $request->xml->storeAs($file_path, $file_name);

        if ($uploaded) {
            $source = storage_path('app/') . $uploaded;
            $file_content = file_get_contents($source);

            $string = str_replace('Unicode', 'UTF-8', mb_convert_encoding($file_content, "UTF-8", "Unicode"));

            $xml = simplexml_load_string($string);

            Upload::create([
                'uploaded_user_id' => 1,
                'file_name'        => $file_name,
                'file_path'        => str_replace('public', 'storage', $file_path),
                'registers'        => (int) $xml->header->qtdImoveis,
                'generated_at'     => (string) $xml->header->DataGeracaoArquivo,
                'creator'          => (string) $xml->header->cnpjCartorio,
                'processed'        => false,
            ]);

            return redirect(route('uploads.index'))->with('success', 'Arquivo enviado com sucesso!');
        }

        return redirect(route('uploads.index'))->with('error', 'Falha no upload do arquivo!');
    }

    public function procFile(Upload $upload)
    {
        $source = storage_path('app/') . str_replace('storage', 'public', $upload->file_path) . "/$upload->file_name";
        $file_content = file_get_contents($source);

        $string = str_replace('Unicode', 'UTF-8', mb_convert_encoding($file_content, "UTF-8", "Unicode"));

        $xml = simplexml_load_string($string);

        $imovel = null;
        $proprietario = null;
        foreach ($xml->Imoveis->children() as $imovelXML) {
            $image_path = 'public/files/images';

            Storage::put("$image_path/$imovelXML->nomeArquivo", base64_decode($imovelXML->conteudoArquivo));

            $imovel = Imovel::where('matricula', $imovelXML->Matricula)->first();

            if (!$imovel) {
                $imovel = new Imovel();
            }

            $imovel->matricula       = $imovelXML->Matricula;
            $imovel->lancamento      = $imovelXML->Lancamento;
            $imovel->venda           = $imovelXML->dataVenda == '' ? null : $imovelXML->dataVenda;
            $imovel->nome_arquivo    = $imovelXML->nomeArquivo;
            $imovel->caminho_arquivo = str_replace('public', 'storage', $image_path);

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

        $upload->processed = true;
        $upload->processed_at = now();
        $upload->processed_user_id = 1;
        $upload->save();

        return redirect(route('uploads.index'))->with('success', 'Arquivo processado com sucesso!');
    }
}
