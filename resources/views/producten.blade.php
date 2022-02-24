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
                            <th>Product naam</th>
                            <th>Voorraad</th>
                            <th>Prijs/Eenheid</th>
                            <th>Eenheid</th>
                            <th>Action</th>
                        </tr>
                    
                        <tr class="mt-6 text-gray-500">
                            <td>Product</td>
                            <td>Product</td>
                            <td>Product</td>
                            <td>Product</td>
                            <td>Product</td>
                        </tr>
                        <tr class="mt-6 text-gray-500">
                            <td>Product</td>
                            <td>Product</td>
                            <td>Product</td>
                            <td>Product</td>
                            <td>Product</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
