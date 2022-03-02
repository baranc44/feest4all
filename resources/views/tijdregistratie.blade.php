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
                    <table style=" width: 90%;">
                        <tr class="mt-8 text-2xl">
                            <th>Project</th>
                            <th>Omschrijving</th>
                            <th>Uren</th>
                        </tr>
                        <tbody id="projectBody">
                            <tr class="trProjects">
                                <td><select name="producten" style="width:100%">
                                    @foreach($products as $product)
                                        <option name="products" value="{{ $product->id }}">{{ $product->naam }} </option>
                                    @endforeach
                                  </select>
                                </td>
                                <td><input style="width: 100%" type="text" name="omschrijving" class="omschrijving" placeholder="omschrijving"></td>
                                <td><input onchange="timeChange()" onkeyup="timeChange()" style="width: 100px" type="number" min="0" name="uren" step="0.01" class="uren" placeholder="uren"></td>
                            </tr>
                        </tbody>
                        <tr>
                            <td></td>
                            <td style="text-align: right">Totaal:</td>
                            <td style="padding-left: 30px; font-weight:bold;"><span id="totalHour">0</span></td>
                        </tr>
                    </table><a class="text-center" class="add" onclick="addProductRow();">
                        <p>+</p>
                    </a>


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

        

        }

        function addProductRow() {

        document.getElementById("projectBody").insertAdjacentHTML('beforeend' ,'<tr class="trProjects">\
                                <td><select name="producten" style="width:100%">\
                                    @foreach($products as $product)\
                                        <option name="products" value="{{ $product->id }}">{{ $product->naam }} </option>\
                                    @endforeach\
                                  </select>\
                                </td>\
                                <td><input style="width: 100%" type="text" name="omschrijving" class="omschrijving" placeholder="omschrijving"></td>\
                                <td><input onchange="timeChange()" onkeyup="timeChange()" style="width: 100px" type="number" min="0" name="uren" step="0.01" class="uren" placeholder="uren"></td>\
                            </tr>');
        }

        function timeChange() {
            const uren = document.getElementsByClassName("uren");
            const length = uren.length;
            let total = 0;

            for (i=0; i<length; i++) {

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
</x-app-layout>
