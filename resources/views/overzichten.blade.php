<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overzichten') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200" style="display:flex;">
                    <div onclick="location.href='overzichtopties'" class="btnOverzicht">
                        <h1>Overzicht</h1> <!-- Overzicht per week,maand,jaar? && per project -->
                    </div>
                    <div onclick="location.href='urenOverzichtUser'" class="btnOverzicht">
                        <h1>Uren per werknemer</h1>
                    </div>
                    <div onclick="location.href='projectKiezen'" class="btnOverzicht">
                        <h1>Producten per project</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .btnOverzicht {
            margin: 2%;
            width: 46%; 
            padding: 150px;
            text-align:center; 
            background-color: rgb(114, 114, 114);
            color:white;
            border-radius: 10px;
            box-shadow: 0 0 10px black;
            font-size: 25px;
        }

        .btnOverzicht:hover {
            background-color: rgb(93, 93, 93);
            transition: 2ms;
            font-size: 23px;
            cursor:pointer;
        }
    </style>
</x-app-layout>
