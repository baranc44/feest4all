{{-- <form action='/urenproject/{{ $projects->id }}' method="POST"> --}}
@foreach ($uren as $uur)
    <tr id="{{$uur->id}}" id="tr" class="mt-6 text-gray-500">
        <div style="text-align: center;">
        <td>{{$uur->project_id}}</td>
        <td>{{$uur->project->naam}}</td>
        <td>{{$uur->uren}}</td>
        </div>
    </tr>
@endforeach
</form>
<tr>
    <td colspan="5">-----------------------------------------------------</td>
</tr>