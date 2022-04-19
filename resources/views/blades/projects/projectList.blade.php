<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left" style="text-align: center;">                 
            <form action='/projectList/{{ $projects->id }}' method="POST">
                @csrf
                <h1 style="font-size: 35px;">{{ $projects->naam }}</h1>
            <table style="width: 100%;">
            <tr class="mt-8 text-2xl">
                <th>Datum</th>
                <th>Uren</th>
                <th>Werknemer</th>
                <th>Omschrijving</th>
                <th>Factuurstatus</th>
            </tr>
            @foreach($uren as $uur)    
            <tr>
                <td>{{$uur->datum}}</td>
                <td>{{$uur->uren}}</td>
                <td>{{$uur->member_id}}</td>
                <td>{{$uur->omschrijving}}</td>
                <td>{{$uur->created_at}}</td>
            </tr>
            @endforeach
            </table>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
