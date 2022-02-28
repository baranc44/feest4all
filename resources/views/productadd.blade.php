<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Producten') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-center">
                    <div>
                        <form action="/product/addproduct" method="POST">
                            @csrf
                            <p>Product naam</p>
                            <input type="text" placeholder="product naam" name="naam" style="width: 60%;"/>
                            <p>Voorraad</p>
                            <input type="number" placeholder="voorraad" name="voorraad" style="width: 60%;"/>
                            <p>Prijs</p>
                            <input type="number" placeholder="prijs" step="any" name="prijs" style="width: 60%;"/>
                            <p>Eenheid</p>
                            <input type="text" placeholder="eenheid" name="eenheid" style="width: 60%;"/>
                            <button type="submit" style="width: 60%;" class="btn px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 active:bg-orange-700 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Voeg toe</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        input {
            text-align: center;
        }
    </style>
</x-app-layout>
