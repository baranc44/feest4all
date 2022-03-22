<form action='/urenproject/{{ $projects->id }}' method="POST">
@foreach ($projects as $project)
    <tr id="{{$project->id}}" id="tr" class="mt-6 text-gray-500">
        <div style="text-align: center;">
        <td>{{$project->id}}</td>
        <td>{{$project->naam}}</td>
        <td>{{$project->uurprijs}}</td>
        </div>
    </tr>
@endforeach
</form>
<tr>
    <td colspan="5">-----------------------------------------------------</td>
</tr>