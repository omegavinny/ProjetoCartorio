@extends('layouts.auths')

@section('content')
<h3 class="text-center">Cadastro</h3>
<form action="" method="post">
    <div class="w-full py-3">
        <input type="text" name="name" id="name" placeholder="Nome" value="{{ old('name') }}" autofocus class="border-2 border-gray-200 focus:border-blue-500 focus:outline-none py-2 px-3 rounded-lg w-full">
        <small class="font-semibold text-red-300"></small>
    </div>

    <div class="w-full py-3">
        <input type="email" name="email" id="email" placeholder="E-mail" value="{{ old('email') }}" class="border-2 border-gray-200 focus:border-blue-500 focus:outline-none py-2 px-3 rounded-lg w-full">
        <small class="font-semibold text-red-300"></small>
    </div>

    <div class="w-full py-3">
        <input type="password" name="password" id="password" placeholder="Senha" value="" class="border-2 border-gray-200 focus:border-blue-500 focus:outline-none py-2 px-3 rounded-lg w-full">
    </div>

    <div class="w-full py-3">
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmação de Senha" value="" class="border-2 border-gray-200 focus:border-blue-500 focus:outline-none py-2 px-3 rounded-lg w-full">
    </div>

    <button type="submit" class="bg-blue-600 font-semibold hover:bg-blue-500 hover:text-white hover:underline py-3 rounded-lg text-gray-50 uppercase w-full">Cadastro</button>
</form>
@endsection
