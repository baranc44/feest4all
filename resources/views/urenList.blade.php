@foreach ($uren as $uur)
    <tr id="{{$uur->id}}" class="mt-6 text-gray-500">
    <td>{{$uur->datum}}</td>
    <td>{{$uur->uren}}</td>
    <td>{{$uur->project_id}}</td>
    <td>{{$uur->omschrijving}}</td>
    <td>
    <div class="float-right">
        <form action="/uren/{{$uur->id}}/delete" method="POST">
            @csrf
            @method('POST')
            <button class="btn px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"><i class="fas fa-trash-alt"></i></button>  
        </form>
    <a href="/project/edit" class="btn px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fas fa-pencil-alt"></i></a>
    </div>
</td>
</tr>
    @endforeach
    <tr>
        <td colspan="5">-----------------------------------------------------</td>
    </tr>
