<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vendre un produit') }}
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
                            {{ session('success') }}
                            @endif
                            @if(session('qrcode') !== null)
                                    <div class="row">
                                        <div class="text-center align-items-center">
                                            <img src="{{session('qrcode')}}" alt="" class="img-fluid">
                                            <button class="btn btn-link btn-primary">
                                                <a download="{{session('qrcode')}}" href="{{session('qrcode')}}">Telecharger</a>
                                            </button>
                                        </div>
                                    </div>
                            @endif
                        </div>
                        <div class="flex flex-wrap">

                            <form action="{{ route('ventes.store') }}" method="post" class="mt-5 border-3 border-gray-800 w-full">
                                @csrf
                                <label for="nom" class="block text-gray-700 font-bold mb-2">Nom du client</label>
                                <input type="text" name="nom_client" required placeholder="Ex : Stephane MBIA" class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{old('nom_client')}}">

                                <label for="produit" class="block text-gray-700 font-bold mt-4 mb-2">Produit vendu</label>
                                <select name="produit_id" class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    @foreach($produits as $produit)
                                        <option value="{{$produit->id}}">{{ $produit->nom }} - {{ $produit->prix }} FCFA</option>
                                    @endforeach
                                </select>
                                <br>

                                <label for="quantite" class="block text-gray-700 font-bold mt-4 mb-2">Quantite</label>
                                <input type="number" name="quantite" required placeholder="Ex : 3" class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{old('quantite')}}">
                                <br>
                                <label for="paye" class="block text-gray-700 font-bold mt-4 mb-2">Montant encaisse</label>
                                <input type="number" name="paye" required placeholder="Ex : 30000" class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" value="{{old('paye')}}">
                                <br>
                                <input type="submit" value="Vendre" required class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
