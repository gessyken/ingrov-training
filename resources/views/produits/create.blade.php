<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajout d\'un produit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto">
                        <div class="text-red-500 text-inherit bg-inherit bg-red-500 font-bold px-4 py-2 rounded w-full">
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @endif
                            @if(session('success') !== null)
                                    Produit ajoute avec succes
                            @endif
                        </div>
                        <div class="flex flex-wrap">

                            <form action="{{ route('produits.store') }}" method="post" class="mt-5 border-3 border-gray-800 w-full">
                                @csrf
                                <label for="nom" class="block text-gray-700 font-bold mb-2">Nom du produit</label>
                                <input type="text" name="nom" placeholder="Ex : Jack Daniel" class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <label for="prix" class="block text-gray-700 font-bold mt-4 mb-2">Prix du produit</label>
                                <input type="number" name="prix" placeholder="Ex : 15000" class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <br>
                                <input type="submit" value="Ajouter" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
