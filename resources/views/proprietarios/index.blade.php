@extends('layouts.app')

@section('content')
<h3 class="text-2xl font-semibold">Proprietários  ({{ count($proprietarios) }})</h3>

<table class="mt-4 w-full">
    <thead>
        <tr class="bg-blue-900 text-gray-50">
            <th class="py-2 px-3">Nome</th>
            <th class="py-2 px-3">CNPJ/CPF</th>
            <th class="py-2 px-3">Endereço</th>
            <th class="py-2 px-3">Imóveis</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proprietarios as $proprietario)
        <tr class="bg-gray-50 border-b border-gray-200 even:bg-blue-100 hover:bg-opacity-5 last:border-blue-900">
            <td class="py-2 px-3">{{ $proprietario->nome }}</td>
            <td class="py-2 px-3">{{ $proprietario->documento }}</td>
            <td class="py-2 px-3">
                {{ $proprietario->endereco }}
                {{ $proprietario->numero }}
                {{ $proprietario->complemento }}
                {{ $proprietario->bairro }}
                {{ $proprietario->municipio }}
                {{ $proprietario->uf }}
                {{ $proprietario->cep ? $proprietario->cep : '00000-000' }}
            </td>
            <td class="py-2 px-3 text-center">
                <ul>
                @foreach ($proprietario->imoveis as $imovel)
                    <li class="text-sm py-1">
                        <a href="{{ str_replace('\\', '/', $imovel->caminho_arquivo) }}/{{ $imovel->nome_arquivo }}" class="text-blue-500 hover:underline">
                            {{ $imovel->matricula }}
                        </a>
                    </li>
                @endforeach
                </ul>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
