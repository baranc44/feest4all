<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projecten') }}
        </h2>
    </x-slot>
    <div id="message">
        @if(Session::has('message'))
            {!! Session::get('message') !!}
        @endif
    </div>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <table style="width: 100%; text-align: left;">
                        <tr class="mt-8 text-2xl">
                            <th>Projectnummer</th>
                            <th>Projectnaam</th>
                            <th>Actie</th>
                        </tr>
                        @foreach($projecten as $project)
                        <tbody id="projectenBody">
                        <tr id="{{ $project->id }}"class="mt-6 text-gray-500 trproducts">
                            <td><span>{{$project->project_number}}</span><input class="hidden" type="text" value="{{$project->project_number}}"/></td>
                            <td><span>{{$project->name}}</span><input class="hidden" type="text" value="{{$project->name}}"/></td>
                            <td>
                                <div>

                                    <a href="/project/{{ $project->id }}/edit" id="edit" class="btn px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"><i class="fas fa-pencil-alt"></i></a> 
                                    @if (Auth::user()->power == 1)
                                    <form action="/project/{{ $project->id }}/delete" method="POST">
                                        @csrf
                                        @method('post')
                                        <button id="delete" class="btn px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition"><i class="fas fa-trash-alt"></i></button></td>
                                    </form>
                                    @endif                                
                                </div> 
                            </td>                    
                        </tr>
                        </tbody>
                        @endforeach
                    </table>  
                    <div class="text-center">
                        <a href="{{ route('projecten/create') }}" class=" px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Nieuw project</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() { $('#message').html(''); }, 4000);
    </script>
    <style>
        .btn {
            width:  40px;
            height: 40px;
            float:left;
            margin-left: 2px;
        }

        .trproducts > td:last-child {
            display: flex;
        }

        input {
            height: 35px;
        }

        form {
            display: inline;
        }

        .btn {
            width:  40px;
            height: 40px;
            margin-left: 2px;
        }
        .btn > i {
            text-align: center;
        }
    </style>
</x-app-layout>
