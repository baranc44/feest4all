{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left" style="text-align: center;">
            @forelse ($projects as $project)
            <div style="display:block; " class="text-left pt-2">    
                <h1 style="font-size: 35px; display:inline;">{{ $project->project_nummer }} {{ $project->naam }} </h1> 
                @if (count($project->uren) > 0)
                <a href="export/{{$project->id}}" style="display:inline;" class="btn btn-success">Exporteren</a>
                @else 
                <p style="display:inline;">Geen data om te exporteren</p>
                @endif
                <p scope="col" id="showBtn{{$project->id}}" onclick="show({{$project->id}});" style="display:inline; color:rgb(33, 129, 231); cursor:pointer; user-select:none;"> [show table] </p>
                <p scope="col" id="hideBtn{{$project->id}}" onclick="hide({{$project->id}});" style="display:inline; color:rgb(232, 29, 29); cursor:pointer; user-select:none;" class="v-hidden"> [hide table] </p>
                <br>
            </div> 
                <table style="width:100%"class="text-left table hidden" id="table{{$project->id}}">
                <thead>
                <tr class="mt-8 text-2xl">
                    <th scope="col">Datum</th>
                    <th scope="col">Uren</th>
                    <th scope="col">Werknemer</th>
                    <th scope="col">Omschrijving</th>
                    <th scope="col">Factuurstatus</th>
                </tr>
                </thead>
                <tbody style="text-align: left;" >
                    @forelse($project->uren as $uur)    
                    <tr>
                        <td scope="row">{{$uur->datum}}</td>
                        <td >{{$uur->uren}}</td>
                        <td >{{$uur->member_id}}</td>
                        <td >{{$uur->omschrijving}}</td>
                        <td >{{$uur->created_at}}</td>
                    </tr>
                    @empty 
                    <tr><td style="column-span: all; text-align:center; color:red;"><b>No Data</b></td></tr>
                    @endforelse
                </tbody>
                </table>
                @empty 
                <p> no data </p>
            @endforelse  
            </div>
        </div>