<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left" style="text-align: center;">                 
            <form action='/projectProducten/{{ $projects->id }}' method="POST">
                @csrf
            <table id="tableId">
            @foreach($products as $product)
            <tr>
                <td>{{ $product->product->naam}}</td>
            </tr>
            @endforeach
            </table>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>