<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="text-sm text-gray-600 font-semibold text-xs">
            {{ __('パスワードをお忘れの場合は、登録済のメールアドレスを入力してください。パスワードリセット用のリンクをお送りします。リセットリンクの有効期限は、60分です。') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="my-6">
                <x-label for="email" :value="__('登録済メールアドレス')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('リセットリンク送信') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
