<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('organizations.create') }}">
            @csrf

            <!-- Organization Name -->
            <div>
                <x-label for="organization name" :value="__('Organization Name')" />
                <x-input id="organization_name" class="block mt-1 w-full" type="text" name="Organization Name" :value="old('organization_name')" required autofocus />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
