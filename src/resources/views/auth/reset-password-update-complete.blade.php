<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="my-5">
            <h1 class="text-center font-semibold">パスワードリセット完了</h1>
        </div>
        <div class="text-xs">
            <p>パスワードをリセットしました。ログイン画面から新しいパスワードを入力してください。</p>
        </div>
        <div class="mt-5">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                <x-button class="bg-gradient-to-r from-cyan-500 to-blue-500 opacity-75">
                    {{ __('ログイン画面へ') }}
                </x-button>
            </a>
        </div>
    </x-auth-card>
</x-guest-layout>
