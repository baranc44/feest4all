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
    <tr>
        <td colspan="5">{{$products->links()}}</td>
    </tr>