<form action="#" method="post">
    <h4 class="font-bold py-3 text-center text-lg">Filtros</h4>
    @csrf
    <div class="flex justify-around">
        <div>
            <label for="matricula" class="block font-medium pb-2 text-center">Matrícula</label>
            <input type="number" name="matricula" id="matricula" class="border-2 border-gray-400 py-2 px-3 rounded-lg">
            @error('matricula')
            <small class="font-semibold text-red-500">* {{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="inscricao" class="block font-medium pb-2 text-center">Inscrição</label>
            <input type="number" name="inscricao" id="inscricao" class="border-2 border-gray-400 py-2 px-3 rounded-lg">
            @error('inscricao')
            <small class="font-semibold text-red-500">* {{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="dt_cadastro" class="block font-medium pb-2 text-center">Dt. Cadastro</label>
            <input type="date" name="dt_cadastro" id="dt_cadastro" class="border-2 border-gray-400 py-2 px-3 rounded-lg">
            @error('dt_cadastro')
            <small class="font-semibold text-red-500">* {{ $message }}</small>
            @enderror
        </div>

        <div>
            <label for="dt_alteracao" class="block font-medium pb-2 text-center">Dt. Alteração</label>
            <input type="date" name="dt_alteracao" id="dt_alteracao" class="border-2 border-gray-400 py-2 px-3 rounded-lg">
            @error('dt_alteracao')
            <small class="font-semibold text-red-500">* {{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="bg-yellow-600 hover:bg-yellow-400 hover:text-white hover:underline px-6 rounded-lg text-gray-50 uppercase">Filtar</button>
    </div>
</form>
