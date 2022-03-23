<x-app-layout>
    <script>
        BASE_URL="<?php echo url('');?>"
    </script>
    <x-slot name="header">
        <h2>
            {{ __('Overzichten') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left">
                    <select style="margin-bottom: 20px;" onchange="search(value)" name="users" style="width: 300px;">
                        <option value="-1" hidden>Selecteer project</option>                    
                    </select>              
                    <table style="width: 100%;">
                        <tr class="mt-8 text-2xl">
                            <th>Project ID</th>
                            <th>Project Naam</th>
                            <th>Uren</th>
                        </tr>
                        <tbody id="tbody">
                             @include('projectList')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>