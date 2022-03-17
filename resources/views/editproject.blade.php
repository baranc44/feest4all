<x-guest-layout>
    @csrf
    <div class="mt-8 sm:mx-auto sm:w-full" style="width: 59%;">
        <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
            <div class="mb-0 space-y-6 ">        
            <form action='/project/{{ $projects->id }}/edit' method="POST">
                @csrf
                   <h1 class="text-6xl font-bold text-center">Nieuw project</h1>
                <input type="number" id="pnummer" name="project_nummer" value="{{ $projects->project_nummer }}" placeholder="{{ __('Project nummer') }}"class="sm:w-full form-control border-gray-300 rounded-md shadow-sm block mt-1">
                <input type="text" id="pnaam"name="naam" value="{{ $projects->naam }}" placeholder="{{ __('Project naam') }}"class="sm:w-full form-control border-gray-300 rounded-md shadow-sm block mt-1">
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
                            <option name="products" value="{{ $product->id }}">{{ $product->id }}</option>
                        @endforeach   
                        </select>                  
                    </td>
                                <td><input type="text" id="amount"name="amount" value="0" placeholder="Hoeveelheid"></td>
                                <td><input type="text" name="comment" placeholder="Opmerkingen"></td>                                         
                            </tr>
                </table>
                <div class="text-center">
                    <a>+</a>
                </div>
                <button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-smt ext-sm font-medium text-white bg-orange-600 hover:big-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">Wijzig</button>         
            </form>
            </div>           
        </div>
    </div>       
</x-guest-layout>











