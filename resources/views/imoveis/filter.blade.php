<form action="/cartorio/imoveis" method="get">
    <h4 class="font-bold text-center text-lg">Filtros</h4>
    <div class="grid md:grid-cols-6 w-full">
        <div class="col-span-1 mt-3">
            <input type="number" name="matricula" id="matricula" class="border-2 border-gray-200 focus:border-blue-500 focus:outline-none py-2 px-3 rounded-lg">
        </div>

        <div class="col-span-1 mt-3">
            <input type="text" name="inscricao" id="inscricao" class="border-2 border-gray-200 focus:border-blue-500 focus:outline-none py-2 px-3 rounded-lg">
        </div>

        <div class="col-span-1 mt-3">
            <input type="date" name="dt_cadastro" id="dt_cadastro" class="border-2 border-gray-200 focus:border-blue-500 focus:outline-none py-2 px-3 rounded-lg">
        </div>

        <div class="col-span-1 mt-3">
            <input type="date" name="dt_alteracao" id="dt_alteracao" class="border-2 border-gray-200 focus:border-blue-500 focus:outline-none py-2 px-3 rounded-lg">
        </div>

        <div class="col-span-1 mt-3">
            <button type="submit" class="bg-yellow-600 font-semibold hover:bg-yellow-500 hover:text-white hover:underline px-8 py-2 rounded-lg text-gray-50 uppercase">Filtar</button>
        </div>

        <div class="col-span-1 mt-3">
            <button type="reset" class="bg-red-600 font-semibold hover:bg-red-500 hover:text-white hover:underline px-8 py-2 rounded-lg text-gray-50 uppercase">Limpar</button>
        </div>
    </div>
</form>
