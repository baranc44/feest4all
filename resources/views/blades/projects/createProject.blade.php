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
                @csrf
                   <h1 class="text-6xl font-bold text-center">Nieuw project</h1>
                <input type="number" id="pnummer" name="project_nummer" placeholder="{{ __('Project nummer') }}"class="sm:w-full form-control border-gray-300 rounded-md shadow-sm block mt-1">
                <input type="text" id="pnaam"name="naam" placeholder="{{ __('Project naam') }}"class="sm:w-full form-control border-gray-300 rounded-md shadow-sm block mt-1">
                <h1 class="text-6xl font-bold text-center">Producten</h1>
                <table id="tableId" name="table" style="width: 100%; !important; text-align: left;">               
                    <tr class="mt-8 text-2xl">
                        <th>Product</th>
                        <th>Hoeveelheid</th>
                        <th>Opmerkingen</th>
                    </tr>
                    <tr>
                        <td><select name="producten">
                            @foreach($products as $product)
                                <option value="-1" hidden>Voeg een product toe</option>
                                <option name="products" value="{{ $product->id }}">{{ $product->name }} </option>
                            @endforeach
                          </select></td>
                                <td><input style="width: 17vw;" type="number" id="amount" name="amount" value="0" placeholder="Hoeveelheid"></td>
                                <td><input style="width: 17vw;" type="text" name="comment" placeholder="Opmerkingen"></td>                                         
                            </tr>
                </table>
                <div class="text-center">
                    <a>+</a>
                </div>
                <button onclick="allData(); allowEmpty();" id="buttonSubmit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-smt ext-sm font-medium text-white bg-orange-600 hover:big-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">Aanmaken</button>         
            </div>           
        </div>
    </div>       
    <script>
        $(document).ready(function(){
            var tbody = $('#tableId').children('tbody');
            var table = tbody.length ? tbody : $('tableId');
            $('a').click(function(){
            table.append('<tr> <td><select name="producten"> <option value="-1" hidden>Voeg een product toe</option> @foreach($products as $product) <option name="products" value="{{ $product->id }}">{{ $product->name }} </option> @endforeach</select></td><td><input style="width: 17vw;" type="number" name="amount" placeholder="Hoeveelheid" value="0"></td><td><input style="width: 17vw;" type="text" name="comment" placeholder="Opmerkingen"></td></tr>');
            })
        });  
        function allData(){
            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            const p_number = document.getElementById("pnummer").value;
            const p_name = document.getElementById("pnaam").value;
            const products = document.getElementsByName("producten");
            const amount = document.getElementsByName("amount");
            const comment = document.getElementsByName("comment");
            var array = new Array();
            let length = products.length;
            for (i = 0; i < length; i++)
            {
                var a = [products[i].value, amount[i].value, comment[i].value];   
                array.push(a);
                
            }     
            console.log(array);
            $.ajax({
            type: 'post',
            url: '/projecten/store',
            data: {
                array: array,
                project_number: p_number,
                project_name: p_name
            },success: function(){
                location.replace('/projecten');
            },error: function(){
                alert("Vul alle velden in");
            }
            });
        }  
        function allowEmpty(){
            const products = document.getElementsByName("producten");
            const amount = document.getElementsByName("amount");
            const comment = document.getElementsByName("comment");

            for(i=0; i < length; i++){
                if(products[i].value == "" || amount[i].value == "" || comment[i].value == ""){
                    var a = [products[i].value, amount[i].value, comment[i].value];
                    array.push(a);
                }
                console.log(array);
            }
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











