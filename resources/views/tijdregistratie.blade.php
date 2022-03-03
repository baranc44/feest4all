<x-app-layout>
    <script>
        BASE_URL="<?php echo url('');?>"
    </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Producten') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-left">
                    <table style=" width: 100%;">
                        <tr class="mt-8 text-2xl">
                            <th style="width: 200px">Datum</th>
                            <th>Project</th>
                            <th>Omschrijving</th>
                            <th>Uren</th>
                        </tr>
                        <tbody id="projectBody">
                            <tr class="trProjects">
                                <td><input name="datum" style="width: 200px" type="date"></td>
                                <td><select name="projects" style="width:100%">
                                    @foreach($projects as $project)
                                        <option value="" hidden>Select a project</option>
                                        <option name="project" value="{{ $project->id }}">{{ $project->naam }} </option>
                                    @endforeach
                                  </select>
                                </td>
                                <td><input style="width: 100%" type="text" name="omschrijving" placeholder="omschrijving"></td>
                                <td><input onchange="timeChange()" onkeyup="timeChange()" type="number" min="0" name="uren" step="0.01" placeholder="uren"></td>
                            </tr>
                        </tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align: right">Totaal: </td>
                            <td style="font-weight:bold;"> <span id="totalHour">0.00</span></td>
                        </tr>
                        <tr class="buttons">
                            <td colspan="4"><a class="text-center" class="add" onclick="addProductRow();">
                                <p>+</p>
                            </a></td>
                        </tr>
                        <tr class="buttons">
                            <td onclick="send()">submit button</td> 
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function send() {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const date = document.getElementsByName("datum");
            const projectsnames = document.getElementsByName("projects");
            const omschrijving = document.getElementsByName("omschrijving");
            const uren = document.getElementsByName("uren");

            let length = date.length;

            var projects = new Array();

            for (i = 0; i < length; i++) {

                if (date[i].value != '' && projectsnames[i].value != '' && uren[i].value != '')
                {
                project = [date[i].value, projectsnames[i].value, omschrijving[i].value, uren[i].value];

                projects.push(project);
                }
            }

            $.ajax({
                type: "POST",
                url: "tijdpost",
                data: {
                    projects: projects
                }
            });

            //location.replace("/dashboard");

            console.log(projects);

        }

        function addProductRow() {

        document.getElementById("projectBody").insertAdjacentHTML('beforeend' ,'<tr class="trProjects">\
                                <td><input name="datum" style="width: 200px" type="date"></td>\
                                <td><select name="projects" style="width:100%">\
                                    @foreach($projects as $project)\
                                        <option value="-1" hidden>Select a project</option>\
                                        <option name="project" value="{{ $project->id }}">{{ $project->naam }} </option>\
                                    @endforeach\
                                  </select>\
                                </td>\
                                <td><input style="width: 100%" type="text" name="omschrijving" placeholder="omschrijving"></td>\
                                <td><input onchange="timeChange()" onkeyup="timeChange()" type="number" min="0" name="uren" step="0.01" placeholder="uren"></td>\
                            </tr>');
        }

        function timeChange() {
            const uren = document.getElementsByName("uren");
            const length = uren.length;
            let total = 0;

            for (i = 0; i < length; i++) {

                let currentVal = uren[i].value;
                if (!currentVal) {
                    currentVal = 0;
                } 
                total += parseFloat(currentVal);
                
            }
            total = total.toFixed(2);
            
            document.getElementById("totalHour").innerHTML = total;
        }
    </script>
    <style>
        td:last-child, th:last-child {
            width: 100px;
            text-align: center;
        }

        td:last-child > input {
            text-align: center;
            
        }

        @media only screen and (max-width: 1000px) {
        
            .buttons {
                color: red;
                text-align: center;
            }
            
            th {
                display: none;
            }
            td {
                display:flex;
            }

            input["number"] {
                width: 100%;
            }
            

        }
    </style>
</x-app-layout>
