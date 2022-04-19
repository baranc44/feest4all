
<table class="table" style="width: 100%;">
    <thead>
    <tr class="text-left mt-8 text-2xl">
        <th >Datum</th>
        <th >Uren</th>
        <th >Werknemer</th>
        <th >Project</th>
    </tr>
</thead>
<tbody style="text-align: left;" >
@foreach ($uren_users as $uren)
    <tr class="mt-6 text-gray-500"></tr>
    <td>{{$uren->datum}}</td>
    <td>{{$uren->uren}}</td>
    <td>{{$uren->name}}</td>
    <td>{{$uren->naam}}</td>
    </tr>

@endforeach