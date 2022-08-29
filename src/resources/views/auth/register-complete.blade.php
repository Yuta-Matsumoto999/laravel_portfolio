<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="my-3">
            <h1 class="text-center font-semibold">仮登録完了</h1>
        </div>
        <div class="text-xs">
            <p>仮登録が完了しました。<br>
                入力したメールアドレスに仮登録完了のお知らせを送信しました。<br>
                メールアドレスの認証を行なってログインしてください。
            </p>
        </div>
        <div class="mt-5">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                <x-button class="ml-4">
                    {{ __('ログイン画面へ') }}
                </x-button>
            </a>
        </div>
    </x-auth-card>
</x-guest-layout>
