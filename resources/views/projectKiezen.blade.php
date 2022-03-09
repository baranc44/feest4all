<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" >       
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left"style="text-align: center;">
                    <select style="margin-bottom: 20px;" name="users" id="users" style="width: 300px;">
                        <option value="-1" hidden>Kies project</option>                                       
                    @foreach ($projects as $project)
                        <option value="{{$project->id}}">{{$project->naam}}</option>
                    @endforeach                  
                    </select>
                    <a href="{{ url('/projectProducten') }}"><button type="button">Kies &rarr;</button></a>   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
