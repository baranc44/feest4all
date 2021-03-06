<x-app-layout>
    @include('sweetalert::alert')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Werknemers') }}
        </h2>
    </x-slot>
    <div id="message">
        @if(Session::has('message'))
            {!! Session::get('message') !!}
        @endif
    </div>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">      
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left">

                    <table style="width: 100%;">
                        <tr class="mt-8 text-2xl">
                            <th>Naam</th>
                            <th>Email</th>
                            <th>Actie</th>
                        </tr>
                        @foreach($werknemers as $werknemer) 
                        <tbody id="werknemersBody">
                        <tr id="{{$werknemer->id}}" class="mt-6 text-gray-500">
                            <td><span>{{$werknemer->name}}</span><input class="hidden" type="text" value="{{$werknemer->name}}"/></td>
                            <td><span>{{$werknemer->email}}</span><input class="hidden" type="text" value="{{$werknemer->email}}"/></td>
                            <td>
                                    <button id="save" onclick="save({{$werknemer->id}})" class="btn hidden btn px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fas fa-save"></i></button> 
                                    <button id="edit" onclick="edit({{$werknemer->id}})" class="btn px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fas fa-pencil-alt"></i></button> 
                                    <button id="changePw" onclick="changePw({{$werknemer->id}})" class="btn px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fas fa-key"></i></button>
                                    <form action="/werknemer/{{ $werknemer->id }}/delete" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"><i class="fas fa-trash-alt"></i></button></td>
                                    </form>
                            </td>                    
                        </tr>
                        </tbody>
                        @endforeach
                    </table>   
                    {{$werknemers->links()}}
                    <div class="text-center">
                        <a href="{{ route('addwerknemer') }}" class=" px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Nieuwe werknemer</a>
                    </div>                    
                </div>       
            </div>
        </div>
    </div>
</div>
    <script>
            setTimeout(function() { $('#message').html(''); }, 4000);

            function edit(id) {
            
            // Show all the inputs next to the edit button
            $("#"+id).find("td").find("input").removeClass("hidden");
            // Hide all the text next to the edit button
            $("#"+id).find("td").find("span").addClass("hidden");

            // Show the save button
            $("#"+id).find("td").find("#save").removeClass("hidden");
            // Hide the edit button
            $("#"+id).find("td").find("#edit").addClass("hidden");
        }
        function changePw(id){  
                       //csrf token
                       $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });     
            // const { value:pw } = swal({
            //     title: 'Wijzig je wachtwoord',
            //     input: 'password',
            //     inputLabel: 'Password',
            //     inputPlaceholder: 'Wijzig je wachtwoord',
            //     inputAttributes: {
            //         maxlength: 8,
            //         autocapitalize: 'off',
            //         autocorrect: 'off'
            //     }
            // })
            var pw = prompt("Wijzig je wachtwoord");        
            if(pw!=null){   
            $.ajax({
            type: "POST",
            url: "/passwordedit",
            data: {
                id: id,
                password: pw
            },
            success: function( data ) {
                $('#message').html(data.message);
                setTimeout(function() { $('#message').html(''); }, 4000);
            }
            });      
            }
        }
        function save(id) {
            //csrf token
            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // make a product array
            const werknemer = new Array();

            // add the id to the product array [0]
            werknemer.push(id);

            // find the inputs next to the edit / save button and go trough every input
            $("#"+id).find("td").find("input").each(function() {
                // get the value of the input
                value = $(this).val();
                // fill the span with the current value
                $(this).parent("td").find("span").text(value);
                // push the value to a array
                werknemer.push(value);
            });

            // post the data to the productscontroller
            $.ajax({
            type: "POST",
            url: "/werknemeredit",
            data: {
                werknemer: werknemer
            },
            success: function( data ) {
                $('#message').html(data.message);
                setTimeout(function() { $('#message').html(''); }, 4000);
            }
            });  

            // Hide all the inputs next to the edit buttojn
            $("#"+id).find("td").find("input").addClass("hidden");
            // Show all the text next to the edit button
            $("#"+id).find("td").find("span").removeClass("hidden");
        
            // Hide the save button
            $("#"+id).find("td").find("#save").addClass("hidden");                              
            // Show the edit button.
            $("#"+id).find("td").find("#edit").removeClass("hidden");
            }

            function del(id) {
            console.log("delete" +id);
        }

    </script>
    <style>
        .btn {
            width:  40px;
            height: 40px;
            float:left;
            margin-left: 2px;
        }

        @media only screen and (max-width: 810px) {

        .btnSearch {
            width: 100%;
            
        }

        table {
            display:flex;
        }

        th {
            display: none;
        }
        td {
            display:flex;
        }
        form > .btn {
            width: 50%;
        }

        td > .btn {
            width:50%;
        }
    }
    </style>
</x-app-layout>
