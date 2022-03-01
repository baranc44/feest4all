<x-guest-layout>
    @csrf
    <div class="mt-8 sm:mx-auto sm:w-full" style="width: 59%;">
        <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
            <form class="mb-0 space-y-6 " action="/addprojectdata" method="POST" >        
                @csrf
                   <h1 class="text-6xl font-bold text-center">Nieuw project</h1>
                <input type="text" name="project_nummer" placeholder="{{ __('Project nummer') }}"class="sm:w-full form-control border-gray-300 rounded-md shadow-sm block mt-1" required>
                <input type="text" name="naam" placeholder="{{ __('Project naam') }}"class="sm:w-full form-control border-gray-300 rounded-md shadow-sm block mt-1" required>
                <h1 class="text-6xl font-bold text-center">Producten</h1>
                <table style="width: 100%; !important; text-align: left;">
                    <tr class="mt-8 text-2xl">
                        <th>Product</th>
                        <th>Hoeveelheid</th>
                        <th>Opmerkingen</th>
                    </tr>
                
                    <td><select name="producten" style="width:">
                        @foreach($products as $product)
                            <option id="products" value="{{ $product->id }}">{{ $product->naam }} </option>
                        @endforeach
                      </select></td>
                            <td><input type="text" name="amount" value="0"></td>
                            <td><input type="text" name="comment" placeholder="Opmerkingen"></td>
                </table>
                <div class="text-center">
                    <a onclick="addRow();">+</a>
                </div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-smt ext-sm font-medium text-white bg-orange-600 hover:big-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">Aanmaken</button>         
            </form>           
        </div>
    </div>       
    {{-- <script>
        function addRow(){
            var myTable = document.getElementById("productTable");
            var currentIndex = myTable.rows.Length;
            var currentRow = myTable.insertRow(-1);              
        }
    </script> --}}
</x-guest-layout>