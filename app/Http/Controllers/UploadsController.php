<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
}
