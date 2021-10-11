@extends('layouts.app')

@section('content')
<div class="flex justify-between">
    <h3 class="text-2xl font-semibold">Arquivos Enviados</h3>
    <a href="{{ route('uploads.create') }}">Enviar Arquivo</a>
</div>

<div class="py-4 overflow-x-auto">
    <div class="my-4">
        @if (\Session::has('success'))
            <h4 class="py-3 px-6 text-center bg-green-200 text-green-600 font-semibold">
                {!! \Session::get('success') !!}
            </h4>
        @endif

        @if(\Session::has('error'))
            <h4 class="py-3 px-6 text-center bg-red-200 text-red-600 font-semibold">
                {!! \Session::get('error') !!}
            </h4>
        @endif
    </div>

    <table class="w-full">
        <thead>
            <tr class="bg-blue-900 text-gray-50">
                <th class="py-2">Arquivo</th>
                <th class="py-2">Data Envio</th>
                <th class="py-2">Enviado por</th>
                <th class="py-2">Emissor</th>
                <th class="py-2">Data de Geração</th>
                <th class="py-2">Numero de Registros</th>
                <th class="py-2">Processado</th>
                <th class="py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($uploads as $upload)
            <tr class="bg-gray-50 border-b border-gray-200 even:bg-blue-100 hover:bg-opacity-5 last:border-blue-900">
                <td class="py-2 px-3 text-center">
                    <a href="{{ "$upload->file_path/$upload->file_name" }}">
                        {{ $upload->file_name }}
                    </a>
                </td>
                <td class="py-2 px-3 text-center">
                    {{ $upload->created_at->format('d/m/Y H:m:s') }}
                </td>
                <td class="py-2 px-3 text-center">
                    {{ $upload->uploaded_user_id }}
                </td>
                <td class="py-2 px-3 text-center">
                    {{ $upload->creator }}
                </td>
                <td class="py-2 px-3 text-center">
                    {{ $upload->generated_at }}
                </td>
                <td class="py-2 px-3 text-center">
                    {{ 26 }}
                </td>
                <td class="py-2 px-3 text-center">
                    @if ($upload->processed)
                        <span class="text-green-500">Sim</span>
                    @else
                        <span class="text-red-500">Não</span>
                    @endif
                </td>
                <td class="flex justify-around py-2 px-3 text-center">
                    <a href="#process" class="bg-yellow-400 rounded-lg px-2 py-1">Processar</a>
                    <a href="#delete" class="bg-red-400 rounded-lg px-2 py-1">Remover</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
