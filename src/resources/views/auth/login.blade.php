<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="my-5">
            <h1 class="text-center font-semibold">ログイン</h1>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('メールアドレス')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" v-model="loginEmail" required autofocus />

                    <div v-for="item in emailErrors">
                        <p class="text-sm font-bold text-red-500 mt-2">@{{ item.message }}</p>
                    </div>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password"
                                    v-model="password" />

                    <div v-for="item in passwordErrors">
                        <p class="text-sm font-bold text-red-500 mt-2">@{{ item.message }}</p>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="block mt-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="my-6">
                    <x-button class="bg-gradient-to-r from-emerald-400 to-emerald-500 hover:opacity-75" v-bind:disabled="loginButtonDisabled">
                        {{ __('Log in') }}
                    </x-button>
                </div>

                <div class="text-xs">
                    @if (Route::has('password.request'))
                        <a class="underline text-blue-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
