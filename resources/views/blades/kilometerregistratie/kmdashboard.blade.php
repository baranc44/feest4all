@php
use App\Models\Car;
use App\Models\User;
use App\Models\Ride;
use App\Models\Customer;
@endphp
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            @if(Auth::user()->admin == 1)
            <a style="float: right;" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"  href="{{ route('ride.export') }}">Export</a>
            @endif
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="text-align: center">
                <div class="mx-auto">
                    @if(Auth::user()->admin != 1)
                    <div style="margin: 10px">
                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">Voeg nieuwe rit toe:</h1><br>
                        <a class="btn btn-success inline-flex items-center justify-center h-50 w-50 mr-2 text-gray-700 transition-colors duration-150 bg-white rounded-full focus:shadow-outline hover:bg-gray-200" href="{{ route('ride.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="100" class="h-50 w-50" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                    @endif
                    @if(Auth::user()->admin == 1)
                    <div style="width: 100%">
                        <div style="margin-top: 25px; margin-bottom: 25px;">
                            <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-bottom: -70px">Kilometers per auto's:</h1>
                            <canvas id="myChart1" width="600" height="600" style="margin: 0 auto;"><p>testtest</p></canvas>
                        </div>
                        <div style="margin-bottom: 25px;">
                            <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-bottom: -40px">Kilometers per gebruikers:</h1>
                            <canvas id="myChart2" width="600" height="600" style="margin: 0 auto;"></canvas>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <h1 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-bottom: -70px">Kilometers per klant:</h1>
                            <canvas id="myChart3" width="600" height="600" style="margin: 0 auto;"></canvas>
                        </div>
                    </div>
                    @endif
                </div>
                {{-- <script>
                    const ctx1 = document.getElementById('myChart1');
                    const myChart1 = new Chart(ctx1, {
                    type: 'doughnut',
                    data: {
                        labels: 
                        @php
                        $cars = Car::all();
                        $data = array();
                        foreach($cars as $car){
                            $brand = $car->brand;
                            $kind = $car->kind;
                            $lisence = $car->liscense;
                            $data[] = $brand . " " . $kind . " " . "(" . $lisence . ")";
                        }
                        echo json_encode($data)
                        @endphp,
                        datasets: [{
                            label: 'Gemaakte kilometers',
                            data: 
                            @php
                            $cars = Car::all();
                            $data = array();
                            foreach($cars as $car){
                                $total = $car->total;
                                $data[] = $total;
                            }
                            echo json_encode($data)
                            @endphp,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(205, 144, 50, 0.2)',
                                'rgba(50, 179, 181, 0.2)',
                                'rgba(189, 186, 100, 0.2)',
                                'rgba(24, 201, 33, 0.2)',
                                'rgba(122, 198, 157, 0.2)',
                                'rgb(139, 242, 45, 0.2)',
                                'rgb(144, 76, 132, 0.2)',
                                'rgb(186, 196, 227, 0.2)', 
                                'rgb(196, 29, 193, 0.2)',
                                'rgb(140, 33, 225, 0.2)',
                                'rgb(82, 129, 246, 0.2)',
                                'rgb(126, 191, 237, 0.2)', 
                                'rgb(13, 59, 202, 0.2)',
                                'rgb(169, 95, 69, 0.2)',
                                'rgb(216, 236, 146, 0.2)',
                                'rgba(113, 22, 128, 0.2)',
                                'rgba(31, 207, 148, 0.2)',
                                'rgba(198, 71, 137, 0.2)',
                                'rgba(39, 29, 198, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(205, 144, 50, 1)',
                                'rgba(50, 179, 181, 1)',
                                'rgba(189, 186, 100, 1)',
                                'rgba(24, 201, 33, 1)',
                                'rgba(122, 198, 157, 1)',
                                'rgba(113, 22, 128, 1)',
                                'rgba(31, 207, 148, 1)',
                                'rgb(139, 242, 45, 1)',
                                'rgb(144, 76, 132, 1)',
                                'rgb(186, 196, 227, 1)', 
                                'rgb(196, 29, 193, 1)',
                                'rgb(140, 33, 225, 1)',
                                'rgb(82, 129, 246, 1)',
                                'rgb(126, 191, 237, 1)', 
                                'rgb(13, 59, 202, 1)',
                                'rgb(169, 95, 69, 1)',
                                'rgb(216, 236, 146, 1)',
                                'rgba(198, 71, 137, 1)',
                                'rgba(39, 29, 198, 1)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        //cutoutPercentage: 40,
                        responsive: false,
                        plugins: {
                            legend: {
                                position: 'right',
                            }
                        }
                    }
                    });
                    
                    var ctx2 = document.getElementById("myChart2");
                    var myChart2 = new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                        labels: 
                        @php
                        $users = User::all();
                        $data = array();
                        foreach($users as $user){
                            $name = $user->name;
                            $data[] = $name;
                        }
                        echo json_encode($data)
                        @endphp,
                        datasets: [{
                            data: 
                            @php
                            $rides = Ride::all();
                            $users = User::all();
                            $data = array();
                            foreach($users as $user){
                                $userid = $user->id;
                                $total = 0;
                                foreach($rides as $ride){
                                    if($ride->user_id == $userid){
                                        $total += $ride->total_kilometers;
                                    }
                                }    
                                $data[] = $total;
                            }
                            echo json_encode($data)
                            @endphp,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(205, 144, 50, 0.2)',
                            'rgba(50, 179, 181, 0.2)',
                            'rgba(189, 186, 100, 0.2)',
                            'rgba(24, 201, 33, 0.2)',
                            'rgba(122, 198, 157, 0.2)',
                            'rgb(139, 242, 45, 0.2)',
                            'rgb(144, 76, 132, 0.2)',
                            'rgb(186, 196, 227, 0.2)', 
                            'rgb(196, 29, 193, 0.2)',
                            'rgb(140, 33, 225, 0.2)',
                            'rgb(82, 129, 246, 0.2)',
                            'rgb(126, 191, 237, 0.2)', 
                            'rgb(13, 59, 202, 0.2)',
                            'rgb(169, 95, 69, 0.2)',
                            'rgb(216, 236, 146, 0.2)',
                            'rgba(113, 22, 128, 0.2)',
                            'rgba(31, 207, 148, 0.2)',
                            'rgba(198, 71, 137, 0.2)',
                            'rgba(39, 29, 198, 0.2)'

                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(205, 144, 50, 1)',
                            'rgba(50, 179, 181, 1)',
                            'rgba(189, 186, 100, 1)',
                            'rgba(24, 201, 33, 1)',
                            'rgba(122, 198, 157, 1)',
                            'rgb(139, 242, 45, 1)',
                            'rgb(144, 76, 132, 1)',
                            'rgb(186, 196, 227, 1)', 
                            'rgb(196, 29, 193, 1)',
                            'rgb(140, 33, 225, 1)',
                            'rgb(82, 129, 246, 1)',
                            'rgb(126, 191, 237, 1)', 
                            'rgb(13, 59, 202, 1)',
                            'rgb(169, 95, 69, 1)',
                            'rgb(216, 236, 146, 1)',
                            'rgba(113, 22, 128, 1)',
                            'rgba(31, 207, 148, 1)',
                            'rgba(198, 71, 137, 1)',
                            'rgba(39, 29, 198, 1)'
                        ],
                        borderWidth: 2
                        }]
                    },
                    options: {
                        //cutoutPercentage: 40,
                        responsive: false,
                        plugins: {
                            legend: {
                                position: 'right',
                            }
                        }
                    }
                    });
                    
                    var ctx2 = document.getElementById("myChart3");
                    var myChart2 = new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                        labels: 
                        @php
                        $customers = Customer::all();
                        $data = array();
                        foreach($customers as $customer){
                            $name = $customer->company_name;
                            $data[] = $name;
                        }
                        echo json_encode($data)
                        @endphp,
                        datasets: [{
                            data: 
                            @php
                            $rides = Ride::all();
                            $customers = Customer::all();
                            $data = array();
                            foreach($customers as $customer){
                                $customerid = $customer->id;
                                $total = 0;
                                foreach($rides as $ride){
                                    if($ride->customer_id == $customerid){
                                        $total += $ride->total_kilometers;
                                    }
                                }    
                                $data[] = $total;
                            }
                            echo json_encode($data)
                            @endphp,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(205, 144, 50, 0.2)',
                            'rgba(50, 179, 181, 0.2)',
                            'rgba(189, 186, 100, 0.2)',
                            'rgba(24, 201, 33, 0.2)',
                            'rgba(122, 198, 157, 0.2)',
                            'rgb(139, 242, 45, 0.2)',
                            'rgb(144, 76, 132, 0.2)',
                            'rgb(186, 196, 227, 0.2)', 
                            'rgb(196, 29, 193, 0.2)',
                            'rgb(140, 33, 225, 0.2)',
                            'rgb(82, 129, 246, 0.2)',
                            'rgb(126, 191, 237, 0.2)', 
                            'rgb(13, 59, 202, 0.2)',
                            'rgb(169, 95, 69, 0.2)',
                            'rgb(216, 236, 146, 0.2)',
                            'rgba(113, 22, 128, 0.2)',
                            'rgba(31, 207, 148, 0.2)',
                            'rgba(198, 71, 137, 0.2)',
                            'rgba(39, 29, 198, 0.2)'

                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(205, 144, 50, 1)',
                            'rgba(50, 179, 181, 1)',
                            'rgba(189, 186, 100, 1)',
                            'rgba(24, 201, 33, 1)',
                            'rgba(122, 198, 157, 1)',
                            'rgb(139, 242, 45, 1)',
                            'rgb(144, 76, 132, 1)',
                            'rgb(186, 196, 227, 1)', 
                            'rgb(196, 29, 193, 1)',
                            'rgb(140, 33, 225, 1)',
                            'rgb(82, 129, 246, 1)',
                            'rgb(126, 191, 237, 1)', 
                            'rgb(13, 59, 202, 1)',
                            'rgb(169, 95, 69, 1)',
                            'rgb(216, 236, 146, 1)',
                            'rgba(113, 22, 128, 1)',
                            'rgba(31, 207, 148, 1)',
                            'rgba(198, 71, 137, 1)',
                            'rgba(39, 29, 198, 1)'
                        ],
                        borderWidth: 2
                        }]
                    },
                    options: {
                        //cutoutPercentage: 40,
                        responsive: false,
                        plugins: {
                            legend: {
                                position: 'right',
                            }
                        }
                    }
                });
                </script> --}}
            </div>
        </div>
    </div>
</x-app-layout>


