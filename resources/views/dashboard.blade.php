<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a class="btnHover" href="{{ route('exporteren') }}">Exporteren</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Exporteer hier!
                            </div>
                        </div>
                    </div>
                
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a class="btnHover" href="{{ route('projecten') }}">Projecten</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Zie alle projecten hier!
                            </div>
                        </div>
                    </div>
                
                    <div class="p-6 border-t border-gray-200">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>            
                        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a class="btnHover" href="{{ route('werknemers') }}">Werknemers</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Zie de werknemers!
                            </div>
                        </div>
                    </div>
                
                    <div class="p-6 border-t border-gray-200 md:border-l">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>            
                        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a class="btnHover" href="{{ route('planning') }}">Planning</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Maak je planningen hier!
                            </div>
                        </div>
                    </div>
                    <div class="p-6 border-t border-gray-200 md:border-l">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                              </svg>         
                        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a class="btnHover" href="{{ route('producten') }}">Producten</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Zie de producten hier!
                            </div>
                        </div>
                    </div>
                    <div class="p-6 border-t border-gray-200 md:border-l">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                              </svg>          
                        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a class="btnHover" href="{{ route('overzichten') }}">Overzichten</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Alle overzichten zijn hier te vinden!
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a class="btnHover" href="{{ route('tijdregistratie') }}">Tijdregistratie</a></div>
                        </div>
                
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                Laatste uren:
                                @if($uren)
                                <table style="width: 100%; text-align:left;">
                                    <tr class="mt-8 text-2xl">
                                        <th>Datum</th>
                                        <th>Uren</th>
                                        <th>Gefactureerd</th>
                                    </tr>
                                
                                @foreach ($uren as $uur)
                                <tr class="mt-6 text-gray-500">
                                    <td>{{$uur->datum}}</td>
                                    <td>{{$uur->uren}}</td>
                                    <td>{{$uur->gefactureerd}}</td>
                                </tr>
                                    
                                @endforeach
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .btnHover {
                        align-items: center;
                        background-clip: padding-box;
                        background-color: #fa6400;
                        border: 1px solid transparent;
                        border-radius: .25rem;
                        box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
                        box-sizing: border-box;
                        color: #fff;
                        cursor: pointer;
                        display: inline-flex;
                        font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
                        font-size: 16px;
                        font-weight: 600;
                        justify-content: center;
                        line-height: 1.25;
                        margin: 0;
                        min-height: 3rem;
                        padding: calc(.875rem - 1px) calc(1.5rem - 1px);
                        position: relative;
                        text-decoration: none;
                        transition: all 250ms;
                        user-select: none;
                        -webkit-user-select: none;
                        touch-action: manipulation;
                        vertical-align: baseline;
                        width: auto;
                }
                
                    .btnHover:hover,
                    .btnHover:focus {
                        background-color: #fb8332;
                        box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
                    }
                
                    .btnHover:hover {
                        transform: translateY(-3px);
                    }
                
                    .btnHover:active {
                        background-color: #c85000;
                        box-shadow: rgba(0, 0, 0, .06) 0 2px 4px;
                        transform: translateY(0);
                    }
                }

                table {
                    table-layout: fixed;
                }
                </style>
                
            </div>
        </div>
    </div>
</x-app-layout>
