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
                    <a href="product/add" style="margin-bottom: 20px;" class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Voeg product toe</a>
                    <table style="width: 100%;">
                        <tr class="mt-8 text-2xl">
                            <th>Product</th>
                            <th>Voorraad</th>
                            <th>Prijs</th>
                            <th>Eenheid</th>
                            <th>Action</th>
                        </tr>
                    @foreach ($products as $product)
                        <tr id="{{$product->id}}" class="mt-6 text-gray-500" ondblclick="edit({{$product->id}})">
                            <td><span class="">{{$product->naam}}</span><input class="hidden" type="text" placeholder="Vul hier een product in." value="{{$product->naam}}"/></td>
                            <td><span class="">{{$product->voorraad}}</span><input class="hidden" type="number" placeholder="Vul hier de voorraad in." value="{{$product->voorraad}}"/></td>
                            <td><span class="">{{$product->prijs}}</span><input class="hidden" type="number" placeholder="Vul hier de prijs in." value="{{$product->prijs}}"/></td>
                            <td><span class="">{{$product->eenheid}}</span><input class="hidden" type="text" placeholder="Vul hier de eenheid." value="{{$product->eenheid}}"/></td>
                            <td><button id="save" onclick="save({{$product->id}})" class="hidden btn px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fas fa-save"></i></button> 
                            <button id="edit" onclick="edit({{$product->id}})" class="btn px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fas fa-pencil-alt"></i></button> 
                            <form action="product/{{$product->id}}/delete" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"><i class="fas fa-trash-alt"></i></button></td>
                            </form>  
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function edit(id) {
            
            // show all the inputs next to the edit button
            $("#"+id).find("td").find("input").removeClass("hidden");
            // hide all the text next to the edit button
            $("#"+id).find("td").find("span").addClass("hidden");

            // show the save button
            $("#"+id).find("td").find("#save").removeClass("hidden");
            // hide the edit button
            $("#"+id).find("td").find("#edit").addClass("hidden");


        }

        function save(id) {
            //csrf token
            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // make a product array
            const product = new Array();

            // add the id to the product array [0]
            product.push(id);

            // find the inputs next to the edit / save button and go trough every input
            $("#"+id).find("td").find("input").each(function() {
                // get the value of the input
                value = $(this).val();
                // fill the span with the current value
                $(this).parent("td").find("span").text(value);
                // push the value to a array
                product.push(value);
            });

            // post the data to the productscontroller
            $.ajax({
            type: "POST",
            url: "/product/edit",
            data: {
                product: product
            }
        })  
            
            
            // hide all the inputs next to the edit button
            $("#"+id).find("td").find("input").addClass("hidden");
            // show all the text next to the edit button
            $("#"+id).find("td").find("span").removeClass("hidden");

            // hide the save button
            $("#"+id).find("td").find("#save").addClass("hidden");
            // show the edit button
            $("#"+id).find("td").find("#edit").removeClass("hidden");
        }


        function del(id) {
            console.log("delete" +id);
        }
    </script>



    <style>
        table {
            table-layout: fixed;
        }

        td {
            padding-top: 5px;
            padding-bottom: 5px;
            border-bottom: 1px solid rgb(0, 0, 0, 0.2);
        }

        input {
            height: 35px;
        }

        .btn {
            width:  40px;
            height: 40px;
            float:left;
            margin-left: 2px;
        }

        .btn > i {
            text-align: center;
        }

        @media only screen and (max-width: 1000px) {
        
        table {
            display:flex;
        }
        
        th {
            display: none;
        }

        tr {
            border-bottom: 2px solid rgb(0, 0, 0, 0.3);
        }
        td {
            display:flex;
            border-bottom: none;
        }

        td > .btn {
            width:50%;
        }
    </style>
</x-app-layout>
