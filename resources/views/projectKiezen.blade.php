<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" >       
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left"style="text-align: center;">
                    <style>
                        tr:hover{
                            background-color: orange;
                        }
                    </style>
                    <table style="width: 100%; text-align: left;">                        
                        @foreach($projects as $project)
                        <tbody id="projectenBody">
                        <tr id="{{ $project->id }}"class="mt-6 text-gray-500">
                            <td><span>{{$project->naam}}</span><input class="hidden" type="text" value="{{$project->naam}}"/></td>       
                            <td>                     
                                <div class="float-right">
                                    <a href="/projectProducten/{{ $project->id }}"><button id="btn" type="button"><i class="fas fa-eye"></i></button></a>  
                                        @csrf
                                        @method('post')
                                    </form>
                                </div> 
                            </td>                    
                        </tr>
                        </tbody>
                        @endforeach
                    </table>  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>