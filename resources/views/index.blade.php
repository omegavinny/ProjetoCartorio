@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <label class="block py-4 px-6 focus:outline-none">
        <span>Imóveis</span>
        <input type="radio" name="tabs" value="dados" class="hidden" v-model="state.tab" />
    </label>
    <label class="block py-4 px-6 focus:outline-none">
        <span>Proprietários</span>
        <input type="radio" name="tabs" value="anexos" class="hidden" v-model="state.tab" />
    </label>
</div>

<div>
    <div class="hidden">
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
    </div>

    <div class="hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-blue-900 text-gray-50">
                    <th class="py-2 px-3">Nome</th>
                    <th class="py-2 px-3">CPF/CNPJ</th>
                    <th class="py-2 px-3">Endereço</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
