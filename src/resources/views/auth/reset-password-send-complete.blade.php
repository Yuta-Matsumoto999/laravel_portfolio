<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="my-5">
            <h1 class="text-center font-semibold">送信完了</h1>
        </div>
        <div class="text-xs">
            <p>パスワードリセット用リンクを送信しました。<br>
                届いたメールを確認し、パスワードリセットを行なってください。<br>
                リンクの有効期限は、60分です。<br>
                メールが届かない場合は、下記から再度メールアドレスを入力してください。
            </p>
        </div>
        <div class="mt-5">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                <x-button>
                    {{ __('メールが届かない場合はこちら') }}
                </x-button>
            </a>
        </div>
    </x-auth-card>
</x-guest-layout>
