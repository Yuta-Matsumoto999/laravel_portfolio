<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="my-5">
            <h1 class="text-center font-semibold">アカウント登録</h1>
        </div>

        {{-- <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div id="authenticateForm">
                <!-- Name -->
                <div>
                    <x-label for="user_name" :value="__('Name')" />

                    <x-input id="user_name" class="block mt-1 w-full" type="text" name="user_name" :value="old('user_name')" v-model="userName" required autofocus />

                    <div v-for="item in userNameErrors">
                        <p class="text-sm font-bold text-red-500 mt-2">@{{ item.message }}</p>
                    </div>

                    <label class="text-red-500 mt-1 block text-sm">{{ $errors->first('user_name') }}</label>
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('メールアドレス')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" v-model="registerEmail" required />

                    <div v-for="item in emailErrors">
                        <p class="text-sm font-bold text-red-500 mt-2">@{{ item.message }}</p>
                    </div>

                    <label class="text-red-500 mt-1 block text-sm">{{ $errors->first('email') }}</label>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password"
                                    v-model="password"/>

                    <div v-for="item in passwordErrors">
                        <p class="text-sm font-bold text-red-500 mt-2">@{{ item.message }}</p>
                    </div>

                    <label class="text-red-500 mt-1 block text-sm">{{ $errors->first('password') }}</label>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required
                                    v-model="passwordConfirm" />

                    <div v-for="item in passwordConfirmErrors">
                        <p class="text-sm font-bold text-red-500 mt-2">@{{ item.message }}</p>
                    </div>
                </div>

                <div class="my-6">
                    <x-button class="bg-gradient-to-r from-emerald-400 to-emerald-500 hover:opacity-75" v-bind:disabled="registerButtonDisabled">
                        {{ __('Register') }}
                    </x-button>
                </div>

                <div class="text-xs">
                    <a class="underline text-blue-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
