@foreach ($projects as $item)
    <tr id="{{$item->id}}" id="tr" class="mt-6 text-gray-500">
        <div style="text-align: center;">
        <td>{{$item->id}}</td>
        <td>{{$item->project_nummer}}</td>
        <td>{{$item->uurprijs}}</td>
        <td>{{$item->verschotten}}</td>
        <td>{{$item->opdrachtbedrag}}</td>
        <td>{{$item->created_at}}</td>
        </div>
    </tr>
@endforeach
<tr>
    <td colspan="5">-----------------------------------------------------</td>
</tr>