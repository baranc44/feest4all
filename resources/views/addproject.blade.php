<x-guest-layout>
    @csrf
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
            <form class="mb-0 space-y-6" action="/addprojectdata" method="POST" >        
                @csrf
                   <h1 class="text-6xl font-bold text-center">Nieuw project</h1>
                <input type="text" name="id" id="id" placeholder="{{ __('Project nummer') }}"class="form-control border-gray-300 rounded-md shadow-sm block mt-1" required>
                <input type="text" name="name" placeholder="{{ __('Project naam') }}"class="form-control border-gray-300 rounded-md shadow-sm block mt-1" required>
                <h1 class="text-6xl font-bold text-center">Producten</h1>
                <html>                    
                    <select name="producten" id="">
                        @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->naam }}</option>
                        @endforeach
                      </select>     
                      <input type="text" name="amount">               
                </html>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-smt ext-sm font-medium text-white bg-orange-600 hover:big-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">Aanmaken</button>
            </form>           
        </div>
    </div>       
</x-guest-layout>