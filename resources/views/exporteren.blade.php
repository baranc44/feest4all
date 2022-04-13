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
                    <div class="text-center align-super">
                        <h1>Kies Begindatum &#8628;</h1>
                        <input onchange="change(value);" type="date" onkeydown="return false">
                    </div>
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
                    url:BASE_URL+"/allExports",
                    data: {
                        date: date
                    },
                    success:function(data){
                        $('#tbody').html(data);
                    }
                });
                }, 500);     
            }

            function show(id) {
                $("#table"+id).removeClass('hidden');
                $("#hideBtn"+id).removeClass('v-hidden');
                $("#showBtn"+id).addClass('v-hidden');   
            }

            function hide(id) {
                $("#table"+id).addClass('hidden');
                $("#hideBtn"+id).addClass('v-hidden');
                $("#showBtn"+id).removeClass('v-hidden');   
            }
    </script>
    <style>
        .v-hidden {
            display:none !important;
        }

        .btn {
        display: inline-block;
        margin-bottom: 0;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        }

        .btn-success{color:#fff;background-color:#5cb85c;border-color:#4cae4c}.btn-success.focus,.btn-success:focus{color:#fff;background-color:#449d44;border-color:#255625}.btn-success:hover{color:#fff;background-color:#449d44;border-color:#398439}.btn-success.active,.btn-success:active,.open>.dropdown-toggle.btn-success{color:#fff;background-color:#449d44;background-image:none;border-color:#398439}.btn-success.active.focus,.btn-success.active:focus,.btn-success.active:hover,.btn-success:active.focus,.btn-success:active:focus,.btn-success:active:hover,.open>.dropdown-toggle.btn-success.focus,.open>.dropdown-toggle.btn-success:focus,.open>.dropdown-toggle.btn-success:hover{color:#fff;background-color:#398439;border-color:#255625}.btn-success.disabled.focus,.btn-success.disabled:focus,.btn-success.disabled:hover,.btn-success[disabled].focus,.btn-success[disabled]:focus,.btn-success[disabled]:hover,fieldset[disabled] .btn-success.focus,fieldset[disabled] .btn-success:focus,fieldset[disabled] .btn-success:hover{background-color:#5cb85c;border-color:#4cae4c}.btn-success .badge{color:#5cb85c;background-color:#fff}
    </style>
</x-app-layout>
