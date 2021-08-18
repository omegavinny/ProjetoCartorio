@extends('layouts.app')

@section('content')
<table>
    <thead>
        <tr class="bg-gray-100">
            <th class="py-2 px-3">ID</th>
            <th class="py-2 px-3">Matricula</th>
            <th class="py-2 px-3">Lançamento</th>
            <th class="py-2 px-3">Venda</th>
            <th class="py-2 px-3">Proprietarios</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($imoveis as $imovel)
        <tr class="border-b border-gray-200">
            <td class="py-2 px-3 text-center">{{ $imovel->id }}</td>
            <td class="py-2 px-3 text-center">{{ $imovel->matricula }}</td>
            <td class="py-2 px-3 text-center">{{ $imovel->lancamento }}</td>
            <td class="py-2 px-3 text-center">{{ $imovel->venda }}</td>
            <td class="py-2 px-3 text-justify">
                @foreach ($imovel->proprietarios as $proprietario)
                    <span>{{ $proprietario->nome }}.</span>
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
