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
                    <table>
                        <tr class="mt-8 text-2xl">
                            <th class="w-1/4">Product naam</th>
                            <th class="w-1/4">Voorraad</th>
                            <th class="w-1/4">Prijs/Eenheid</th>
                            <th class="w-1/4">Eenheid</th>
                            <th class="w-1/4">action</th>
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
