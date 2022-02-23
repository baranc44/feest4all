<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Gebruikersnaam" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-input id="wachtwoord" class="block mt-1 w-full" type="password" name="password" placeholder="Wachtwoord" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="bg-orange-600 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded-full">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
