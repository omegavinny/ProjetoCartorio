@extends('layouts.app')

@section('content')
<div class="py-4 w-1/2 mx-auto">
    <h3>Envio do XML</h3>

    <hr>

    <form action="/cartorio/upload" method="post" enctype="multipart/form-data">
        @csrf
        <div class="py-4">
            <label for="xml" class="block font-medium pb-2">Selecione o arquivo (XML) para envio: </label>
            <input type="file" name="xml" id="xml" accept=".xml,.XML" class="block w-full py-2">
            @error('xml')
            <small class="font-semibold text-red-500">* {{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 px-8 py-3 text-gray-50 text-medium uppercase rounded-lg hover:bg-blue-600 hover:text-white">Enviar</button>
    </form>
</div>
@endsection
