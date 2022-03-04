<x-app-layout>
    <script>
        BASE_URL="<?php echo url('');?>"
    </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Producten') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left">
                    <div class="text-center">
                        <input type="search" placeholder="Zoeken..." class="btnSearch" oninput="search(value)"/>                        
                    </div>
                    <table style="width: 100%;">
                        <tr class="mt-8 text-2xl">
                            <th>Product</th>
                            <th>Voorraad</th>
                            <th>Prijs</th>
                            <th>Eenheid</th>
                            <th><a href="product/add" style="margin-bottom: 20px;" class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">+</a></th>
                        </tr>
                        <tbody id="tbody">
                            @include('productsList')
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        let timeout = null;

        function search(search) {
        
            clearTimeout(timeout);

            timeout = setTimeout(function () {
                $.ajax({
                url:BASE_URL+"/producten_ajax?search="+search,
                success:function(data){
                    $('#tbody').html(data);
                }
            });
            }, 500);


            
        }

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
    </script>



    <style>
        .btnSearch {
            border-radius: 25px;
            text-align: center;
            width: 40%;
            
        }

        table {
            table-layout: fixed;
        }
        
        td:first-child, th:first-child {
            padding-left: 10px;
        }

        td {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        th:last-child, td:last-child{
            text-align: center;
            margin: 0;
        }

        tr:nth-child(even) {
        background-color: #eeeeee;
        }

        tr:last-child {
            background-color: #ffffff;
        }

        input {
            height: 35px;
        }

        form {
            display: inline;
        }

        .btn {
            width:  40px;
            height: 40px;
            margin-left: 2px;
        }

        .btn > i {
            text-align: center;
        }

        @media only screen and (max-width: 1380px) and (min-width: 810px)  {
            input, input[type="number"] {
                width: 100%;
            }

            td:nth-child(3) {
                display: flex;
            }
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
    </style>
</x-app-layout>
