<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overzichten') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="selectMenuDiv">
                    <select id="select" onchange="change()">
                        <option value="" selected disabled hidden>&raquo; Klik hier om te kiezen &laquo;</option>
                        <option value="1">Overzicht per week</option>
                        <option value="2">Overzicht per project</option><!-- product per project moet hierin-->
                        <option value="3">Uren per werknemer</option> <!-- admin only -->
                        <option value="4">Maand overzicht</option> <!-- admin only -->
                    <select>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function change() 
        {
            value = document.getElementById("select").value;
            console.log(value);
        }
    </script>
    <style>
        .selectMenuDiv {
            text-align: center;
        }
        
        .selectMenuDiv select {
            background: transparent;
            border: none;
            font-weight: bold;
            color: white;
            background-color: #ff6d2e;
            border-radius: 12px 12px 3px 3px;
            font-size: 30px;
            padding: 20px;
            text-align: left;
            box-shadow: 0px 0px 12px rgb(54, 54, 54);
            
        }

        .selectMenuDiv select > option {
            color: #ff6d2e;
            background-color: white;
            font-weight: bold;
        }


        .selectMenuDiv select:active {
            border: none;
        }
    </style>
</x-app-layout>
