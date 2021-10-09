@extends('layouts.app')

@section('content')
<h3 class="text-2xl font-semibold">Lista de Imóveis</h3>
<div class="py-4 overflow-x-auto">
    <table class="w-full">
        <thead>
            <tr class="bg-blue-900 text-gray-50">
                <th class="py-2 px-3">Matricula</th>
                <th class="py-2 px-3">Inscrição</th>
                <th class="py-2 px-3">Dt. Venda</th>
                <th class="py-2 px-3">Proprietário(s)</th>
                <th class="py-2 px-3">Arquivo</th>
                <th class="py-2 px-3">Dt. Alteração</th>
                <th class="py-2 px-3">Dt. Cadastro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($imoveis as $imovel)
            <tr class="bg-gray-50 border-b border-gray-200 even:bg-blue-100 hover:bg-opacity-5 last:border-blue-900">
                <td class="py-2 px-3 text-center">{{ $imovel->matricula }}</td>
                <td class="py-2 px-3 text-center">{{ $imovel->lancamento }}</td>
                <td class="py-2 px-3 text-center">{{ $imovel->venda }}</td>
                <td>
                    <ul>
                        @foreach ($imovel->proprietarios as $proprietario)
                        <li class="text-sm py-1">{{ $proprietario->nome }}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="py-2 px-3 text-center">
                    <a href="{{ str_replace('\\', '/', $imovel->caminho_arquivo) }}/{{ $imovel->nome_arquivo }}" class="text-blue-500 hover:underline">{{ $imovel->nome_arquivo }}</a>
                </td>
                <td class="py-2 px-3 text-center">{{ $imovel->created_at->format('d/m/Y') }}</td>
                <td class="py-2 px-3 text-center">{{ $imovel->updated_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
