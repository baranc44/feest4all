<x-guest-layout>

    @csrf

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
            <form class="mb-0 space-y-6" action="/addwerknemerdata" method="POST" >        
                @csrf
                   <h1 class="text-6xl font-bold">Nieuwe werknemer</h1>
                <input type="email" name="email" id="email" placeholder="{{ __('Email') }}"class="form-control border-gray-300 rounded-md shadow-sm block mt-1" required>
                <input type="text" name="name" placeholder="{{ __('Volledige naam') }}"class="form-control border-gray-300 rounded-md shadow-sm block mt-1" required>
                <input type="password" name="password" placeholder="{{ __('Wachtwoord') }}"class="form-control border-gray-300 rounded-md shadow-sm block mt-1 focus:ring-2 focus:ring-offset-2 focus:ring-orange-500" required>  
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-smt ext-sm font-medium text-white bg-orange-600 hover:big-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">Registreer</button>
            </form>           
        </div>
    </div>       
</x-guest-layout>