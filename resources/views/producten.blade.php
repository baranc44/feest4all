<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Producten') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left">
                    <table style="width: 100%;">
                        <tr class="mt-8 text-2xl">
                            <th>Product</th>
                            <th>Voorraad</th>
                            <th>Prijs</th>
                            <th>Eenheid</th>
                            <th>Action</th>
                        </tr>
                    @foreach ($products as $product)
                        <tr id="{{$product->id}}" class="mt-6 text-gray-500">
                            <td>{{$product->naam}}</td>
                            <td>{{$product->voorraad}}</td>
                            <td>€ {{$product->prijs}}</td>
                            <td>{{$product->eenheid}}</td>
                            <td><button class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fas fa-pencil-alt"></i></button> 
                                <button class="px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
