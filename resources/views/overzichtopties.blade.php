<x-app-layout>
    <script>
        BASE_URL="<?php echo url('');?>"
    </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overzichten') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
                <form action="" method="POST">
                    @method('post')
                    @csrf
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="container-fluid">
                                <div class="form-group row">            
                                <table>                                                                                                  
                                    <tr>                                                                              
                                        <div class="col-sm-3">
                                           <th><label for="date" class="col-form-label col-sm-2">Van: </label></th>
                                        </div>                                                                                                            
                                        <div class="col-sm-3">                                           
                                            <th><label for="date" class="col-form-label col-sm-2 m-auto">Tot:</label></th>
                                        </div>                                                                            
                                    </tr>           
                                    <tr>
                                        <td><input type="date" class="form-control input-sm" id="from" name="from"></td>    
                                        <td><input type="date" class="form-control input-sm" id="to" name="to"></td>    
                                        <td><input type="submit" onclick="empty();" value="Kies"></td>
                                    </tr>                        
                                </table>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn" name="search" title="Search"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </form>
                {{-- <select style="margin-bottom: 20px;" onchange="search(value)" name="projects" class="projects" style="width: 300px;">
                <option value="-1" hidden>Selecteer een project </option>

                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->naam }}</option>
                @endforeach
                </select> --}}
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left">
                <table style="width: 100%;">
                    <tr class="mt-8 text-2xl">
                        <th>Project ID</th>
                        <th>Project Nummer</th>                     
                        <th>Uurprijs</th>               
                        <th>Verschotten</th>               
                        <th>Opdrachtbedrag</th>                           
                        <th>Gemaakt op</th>                           
                    </tr>   
                    <tbody id="tbody">
                        @include('projectList')
                    </tbody>         
                </table>
                </div> 
            </div>
        </div>
    </div>
    <script>
    let timeout = null;

        function search(search) {
        clearTimeout(timeout);

        timeout = setTimeout(function () {
            $.ajax({
            url:BASE_URL+"/projects_ajax?search="+search,
            success:function(data){
                $('#tbody').html(data);
            }
        });
        }, 500);     
    }
    </script>
</x-app-layout>
