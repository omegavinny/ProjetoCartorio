@extends('layouts.app')

@section('content')
<div class="flex justify-between">
    <h3 class="text-2xl font-semibold">Usuários</h3>
    <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-300 rounded-lg py-2 px-3">
        <span class="text-gray-50 hover:text-white font-semibold">Cadastrar</span>
    </a>
</div>

<div class="py-4 overflow-x-auto">
    <table class="w-full">
        <thead>
            <tr class="bg-blue-900 text-gray-50">
                <th class="py-2">#</th>
                <th class="py-2">Nome</th>
                <th class="py-2">E-mail</th>
                <th class="py-2">Papel</th>
                <th class="py-2">Ativo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr class="bg-gray-50 border-b border-gray-200 even:bg-blue-100 hover:bg-opacity-5 last:border-blue-900">
                <td class="py-2">{{ $user->id }}</td>
                <td class="py-2">{{ $user->name }}</td>
                <td class="py-2">{{ $user->email }}</td>
                <td class="py-2">{{ $user->role }}</td>
                <td class="py-2">{{ $user->active }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
