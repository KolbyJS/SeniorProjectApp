<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First Name -->
            <div>
                <x-label for="first name" :value="__('First Name')" />
                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first name" :value="old('first_name')" required autofocus />
            </div>

            <!-- Last Name -->
            <div>
                <x-label for="last name" :value="__('Last Name')" />
                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last name" :value="old('last_name')" required autofocus />
            </div>

            <!-- Middle Name -->
            <div>
                <x-label for="middle name" :value="__('Middle Name')" />
                <x-input id="middle_name" class="block mt-1 w-full" type="text" name="middle name" :value="old('middle_name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <!-- Status -->
            <div class="mt-4">
                <x-label for="status">Select one for your current status.</x-label>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 
                    bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top 
                    bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                    type="radio" name="status" id="Healthy" value="healthy">
                    <label class="form-check-label inline-block text-gray-800" for="Healthy">Healthy</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 
                    bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top 
                    bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                    type="radio" name="status" id="Sick" value="sick">
                    <label class="form-check-label inline-block text-gray-800" for="Sick">Sick</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 
                    bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top 
                    bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                    type="radio" name="status" id="Quarantine" value="quarantine">
                    <label class="form-check-label inline-block text-gray-800" for="Quarantine">Quarantine</label>
                </div>
            </div>

            <!-- Vaccinated -->
            <div class="mt-4">
                <x-label for="status">Are you vaccinated?</x-label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 
                    bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top 
                    bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                    type="radio" name="vaccinated" id="yes" value="yes">
                    <label class="form-check-label inline-block text-gray-800" for="yes">Yes</label>
                </div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 
                    bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top 
                    bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                    type="radio" name="vaccinated" id="no" value="no">
                    <label class="form-check-label inline-block text-gray-800" for="no">No</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 
                    bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top 
                    bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
                    type="radio" name="vaccinated" id="NA" value="NA">
                    <label class="form-check-label inline-block text-gray-800 opacity-50" for="NA">N/A</label>
                </div>
            </div>

            <!-- Account type -->
            <div class="mt-4">
                <x-label for="role_id" value="{{ __('Register as:') }}" />
                <select name="role_id"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-300
                focus:ring-indego-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="user">User</option>
                    <option value="organization">Organization</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
