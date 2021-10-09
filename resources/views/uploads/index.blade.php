@extends('layouts.app')

@section('content')
<div class="flex justify-between">
    <h3 class="text-2xl font-semibold">Arquivos Enviados</h3>
    <a href="{{ route('uploads.create') }}">Enviar Arquivo</a>
</div>

<div class="py-4 overflow-x-auto">
    <table class="w-full">
        <thead>
            <tr class="bg-blue-900 text-gray-50">
                <th>Arquivo</th>
                <th>Data Envio</th>
                <th>Emissor</th>
                <th>Registros</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-50 border-b border-gray-200 even:bg-blue-100 hover:bg-opacity-5 last:border-blue-900">
                <td class="py-2 px-3 text-center"></td>
                <td class="py-2 px-3 text-center"></td>
                <td class="py-2 px-3 text-center"></td>
                <td class="py-2 px-3 text-center"></td>
            </tr>
            <tr class="bg-gray-50 border-b border-gray-200 even:bg-blue-100 hover:bg-opacity-5 last:border-blue-900">
                <td class="py-2 px-3 text-center"></td>
                <td class="py-2 px-3 text-center"></td>
                <td class="py-2 px-3 text-center"></td>
                <td class="py-2 px-3 text-center"></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
