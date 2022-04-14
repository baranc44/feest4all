<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Overzichten') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
                <div class="p-6 sm:px-2 bg-white border-b border-gray-200" id="overzichten">
                    @if (Auth::user()->power == 1)
                    <div onclick="location.href='overzichtopties'" class="btnOverzicht">
                        <h1>Maand overzicht</h1> <!-- Overzicht per week,maand,jaar? && per project -->
                    </div>
                    @endif
                    <div onclick="location.href='urenOverzichtUser'" class="btnOverzicht">
                        <h1>Uren per werknemer</h1>
                    </div>
                    <div onclick="location.href='projectKiezen'" class="btnOverzicht">
                        <h1>Producten per project</h1>
                    </div>
                    <div onclick="location.href='urenproject'" class="btnOverzicht">
                        <h1>Uren per project</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>

        #overzichten {
            display: flex;
        }
        .btnOverzicht {
            margin: 2%;
            width: 100%; 
            padding: 70px;
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

        @media only screen and (max-width: 810px) {

        #overzichten {
            display:block;
        }

        .btnOverzicht {
            margin-top: 20px;
        }

        }
    </style>
</x-app-layout>
