<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left" style="text-align: center;">                 
            <form action='/projectProducten/{{ $projects->id }}' method="POST">
                @csrf
            <table>
            @foreach($products as $product)
                <td>{{ $product->product_id }}</td>
            @endforeach
            </table>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>