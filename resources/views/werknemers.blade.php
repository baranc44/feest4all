<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Werknemers') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">      
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left">
                    <table style="width: 100%;">
                        <tr class="mt-8 text-2xl">
                            <th>Naam</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        @foreach($werknemers as $werknemer) 
                        <tr class="mt-6 text-gray-500">
                            <td>{{ $werknemer->name }}</td>
                            <td>{{ $werknemer->email }}</td>
                            <td>Action</td>
                            <td>
                            <div class="float-right">
                                <a class="border-b-2 pb-2 border-dotted italic text-green-500" href="/werknemers/{{ $werknemer->id }}/editwerknemer">Edit</a>                      
                                <a class="border-b-2 pb-2 border-dotted italic text-gray-500" href="/werknemers/addwerknemer">Add</a>
                                <a class="border-b-2 pb-2 border-dotted italic text-red-500">Delete</a>
                            </div>

                        </tr>
                        @endforeach
                    </table>                    
                </div>       
            </div>
        </div>
    </div>
</div>
</x-app-layout>
