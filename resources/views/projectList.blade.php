@foreach ($projects as $project)
    <tr id="{{$project->id}}" class="mt-6 text-gray-500">
        <div style="text-align: center;">
        <td>{{$project->id}}</td>
        <td>{{$project->project_nummer}}</td>
        <td>{{$project->uurprijs}}</td>
        <td>{{$project->verschotten}}</td>
        <td>{{$project->opdrachtbedrag}}</td>
        </div>
    </tr>
@endforeach