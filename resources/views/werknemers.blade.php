<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Werknemers') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <table>
                        <tr class="mt-8 text-2xl text-left">
                            <th class="w-1/5">Username</th>
                            <th class="w-1/5">Naam</th>
                            <th class="w-1/5">Email</th>
                        </tr>
                        <tr class="mt-6 text-gray-500 text-left">
                            <td>Username</td>
                            <td>Naam</td>
                            <td>Email</td>
                        </tr>
                    </table>
                </div>                            
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
