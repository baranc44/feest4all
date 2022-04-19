<x-guest-layout>
    @csrf
    <style>
        select{
            max-width: 17vw;
        }
    </style>
    <div class="mt-8 sm:mx-auto sm:w-full" style="width: 59%;">
        <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
            <div class="mb-0 space-y-6 ">        
                   <h1 class="text-6xl font-bold text-center">Wijzig project</h1>
                <input type="number" id="pnummer" name="project_nummer" value="{{ $project->project_nummer }}" placeholder="{{ __('Project nummer') }}"class="sm:w-full form-control border-gray-300 rounded-md shadow-sm block mt-1">
                <input type="text" id="pnaam"name="naam" value="{{ $project->naam }}" placeholder="{{ __('Project naam') }}"class="sm:w-full form-control border-gray-300 rounded-md shadow-sm block mt-1">
                <h1 class="text-6xl font-bold text-center">Producten</h1>
                <table id="tableId" name="table" style="width: 100%; !important; text-align: left;">               
                    <tr class="mt-8 text-2xl">
                        <th>Product</th>
                        <th>Hoeveelheid</th>
                        <th>Opmerkingen</th>
                    </tr>
                    <tr>
                        @foreach($products as $product)
                        <td><select class="selectProducts" name="producten">                  
                            @foreach($products as $item) <option name="products" value="{{ $item->id }}">{{ $item->naam }} </option> @endforeach                                         
                        </select>   
                        </td>                            
                         <td><input style="width: 17vw;" type="text" id="amount" name="amount" value="{{ $product->hoeveelheid }}" placeholder="Hoeveelheid"></td>
                         <td><input style="width: 17vw;" type="text" id="comment" name="comment" value="{{ $product->opmerkingen }}" placeholder="Opmerkingen"></td>                                                           
                    </tr>  
                    @endforeach    
                </table>
                <div class="text-center">
                    <a>+</a>
                </div>
                <button id="button" type="submit" onclick="passData()" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-smt ext-sm font-medium text-white bg-orange-600 hover:big-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">Wijzig</button>
            </div>           
        </div>
    </div>       
    <script>
        var ids =[@foreach($products as $product) {{ $product->id }}, @endforeach ]

        var product_ids =[@foreach($products as $product) {{ $product->product_id }}, @endforeach ]
        var selectedProducts = document.getElementsByClassName('selectProducts');
        for (let i = 0; i < selectedProducts.length; i++) {
            selectedProducts[i].value = product_ids[i];
        }

        
       
      
        $(document).ready(function(){
            var tbody = $('#tableId').children('tbody');
            var table = tbody.length ? tbody : $('tableId');
            $('a').click(function(){
                table.append('<tr> <td> <select name="producten"> <option value="-1" hidden>Voeg een product toe</option> @foreach($products as $item) <option name="products" value="{{ $item->id }}">{{ $item->naam }} </option> @endforeach</select></td><td><input type="number" name="amount" placeholder="Hoeveelheid" value="0"></td><td><input type="text" name="comment" placeholder="Opmerkingen"></td></tr>');
            })
        });
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            function passData(){
            const products = document.getElementsByName("producten");
            const pnummer = document.getElementById("pnummer").value;
            const pnaam = document.getElementById("pnaam").value;
            var amount = document.getElementsByName("amount");
            var comment = document.getElementsByName("comment");
            var array = new Array();
            let length = products.length;
            for (i = 0; i < length; i++)
            {
                var a = [ ids[i], products[i].value, amount[i].value, comment[i].value];
                console.log(a);
                array.push(a);
            }      
            var id = {{ $project->id }}
            $.ajax({
            type: 'post',
            url: '/update',
            data: {
                id: id,
                array: array,
                pnaam: pnaam,
                pnummer: pnummer,
                
            },success: function(){
                location.replace('/projecten');
            },error: function(){
                alert("Vul alle velden in");
            }
            });          
            }
    </script>
    <style>
        
        @media only screen and (max-width: 810px) {

        tr:nth-child(even) input, tr:nth-child(even) select  {
            background-color: #f2f2f2;
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

        input {
            width:100%;
        }

        form > .btn {
            width: 100%;
        }

        td > .btn {
            width:100%;
        }
        }
    </style>
</x-guest-layout>