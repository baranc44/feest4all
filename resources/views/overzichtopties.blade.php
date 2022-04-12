<x-app-layout>
    <script>
        BASE_URL="<?php echo url('');?>"
    </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Exporteren') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <input type="month" onchange="change(value);">
                    <div id="tbody">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let timeout = null;

        function change(date) {
            clearTimeout(timeout);

            timeout = setTimeout(function () {
                $.ajax({
                url: "/overzichtopties_ajax",
                data: {
                    date: date
                },
                success:function(data){
                    $('#tbody').html(data);
                }
            });
            }, 500);
        }
    </script>
</x-app-layout>
