@foreach ($uren as $uur)
    <tr id="{{$uur->id}}" class="mt-6 text-gray-500">
    <td>{{$uur->datum}}</td>
    <td>{{$uur->uren}}</td>
    <td>{{$uur->project_id}}</td>
    <td>{{$uur->omschrijving}}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="5">-----------------------------------------------------</td>
    </tr>