<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User &raquo; Create New User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <form action=" {{route('dashboard.user.store')}} " class="w-full" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-jet-label for="roles" value="{{ __('Roles') }}" />
                        {{ Form::select('roles', ['ADMIN' => 'ADMIN', 'USER' => 'USER'], 'USER') }} 
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
        
                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
        
                    <div class="flex items-center justify-end mt-4">
                       <x-jet-button class="ml-4">
                            {{ __('Create New User') }}
                        </x-jet-button>
                    </div>
                </form>
        
            </div>
        </div>
    </div>
</x-app-layout>
