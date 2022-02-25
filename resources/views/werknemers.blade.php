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
                        <tr id="{{$werknemer->id}}"class="mt-6 text-gray-500">
                            <td><span>{{$werknemer->name}}</span><input class="hidden" type="text" value="{{$werknemer->name}}"/></td>
                            <td><span>{{$werknemer->email}}</span><input class="hidden" type="text" value="{{$werknemer->email}}"/></td>
                            <td>Action</td>
                            <td>
                            <div class="float-right">
                                <button id="save" onclick="save({{$werknemer->id}})" class="hidden btn px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fas fa-save"></i></button> 
                                <button id="edit" onclick="edit({{$werknemer->id}})" class="btn px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fas fa-pencil-alt"></i></button> 
                                <button onclick="del({{$werknemer->id}})" class="btn px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"><i class="fas fa-trash-alt"></i></button></td>
                            </div>
                        </tr>
                        <tr>
                            <td>
                                <div class="float-right">
                                    <button></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>                              
                </div>       
            </div>
        </div>
    </div>
</div>
    <script>
            function edit(id) {
            
            $("#"+id).find("td").find("input").removeClass("hidden");
            $("#"+id).find("td").find("span").addClass("hidden");

            $("#"+id).find("td").find("#save").removeClass("hidden");
            $("#"+id).find("td").find("#edit").addClass("hidden");
        }
            function save(id) {
             
            $("#"+id).find("td").find("input").addClass("hidden");
            $("#"+id).find("td").find("span").removeClass("hidden");
            
            $("#"+id).find("td").find("#edit").removeClass("hidden");
            $("#"+id).find("td").find("#save").addClass("hidden");
                                
            }


    </script>
</x-app-layout>
