@extends('layouts.app')

@section('content')
<div class="flex">
    <h2 class="text-2xl font-semibold">Proprietários  ({{ count($proprietarios) }})</h2>
</div>

<hr />
<table class="w-full">
    <thead>
        <tr class="bg-blue-900 text-gray-50">
            <th class="py-2 px-3">Nome</th>
            <th class="py-2 px-3">CPF/CNPJ</th>
            <th class="py-2 px-3">Endereço</th>
            <th class="py-2 px-3">Quantidade de Imóveis</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proprietarios as $proprietario)
        <tr class="bg-gray-50 border-b border-gray-200 even:bg-blue-100 hover:bg-opacity-5 last:border-blue-900">
            <td class="py-2 px-3">{{ $proprietario->nome }}</td>
            <td class="py-2 px-3 text-center">{{ $proprietario->documento }}</td>
            <td class="py-2 px-3">
                {{ $proprietario->endereco }},
                {{ $proprietario->numero }}
                {{ $proprietario->complemento }}
                - {{ $proprietario->bairro }},
                {{ $proprietario->municipio }}-{{ $proprietario->uf }}
                CEP: {{ $proprietario->cep}}
            </td>
            <td class="py-2 px-3 text-center">{{ count($proprietario->imoveis) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
