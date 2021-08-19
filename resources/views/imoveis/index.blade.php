@extends('layouts.app')

@section('content')
<div class="flex">
    <h2 class="text-2xl font-semibold">Imóveis ({{ count($imoveis) }})</h2>
</div>

<hr />

<table class="w-full">
    <thead>
        <tr class="bg-blue-900 text-gray-50">
            <th class="py-2 px-3">Matricula</th>
            <th class="py-2 px-3">Lançamento</th>
            <th class="py-2 px-3">Dt. Venda</th>
            <th class="py-2 px-3">Proprietário(s)</th>
            <th class="py-2 px-3">Arquivo</th>
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
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
