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
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left">
                    <select style="margin-bottom: 20px;" onchange="search(value)" name="users" id="users" style="width: 300px;">
                        <option value="-1" hidden>Selecteer een werknemer </option>
                        
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                    
                    </select>

                    <table style="width: 100%;">
                        <tr class="mt-8 text-2xl">
                            <th>Datum</th>
                            <th>Uren</th>
                            <th>Project</th>
                            <th>Omschrijving</th>                     
                        </tr>                       
                        <tbody id="tbody">
                            @include('urenList')
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
            url:BASE_URL+"/uren_ajax?search="+search,
            success:function(data){
                $('#tbody').html(data);
            }
        });
        }, 500);     
    }
    </script>
    <style>
        table {
            table-layout: fixed;
        }
        
        td:first-child, th:first-child {
            padding-left: 10px;
        }

        td {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        tr:nth-child(even) {
        background-color: #eeeeee;
        }

        tr:last-child {
            background-color: #ffffff;
        }
    </style>
</x-app-layout>
