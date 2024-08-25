<x-main-layout title="Login - LinguaQuest">
    <div class="flex items-center" style="height: calc(100vh - 120px);">
        <div class="bg-white align-middle rounded-lg p-4 w-1/3 m-auto drop-shadow-xl shadow-violet-950">
            <div class="block text-center text-3xl text-violet-700 font-bold mb-6">{{ __('Login') }}</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-5">
                        <input id="login" type="login" placeholder="{{ __('Email address or username') }}" class="w-full p-2 border rounded-lg @error('login') border-red-600 @enderror" name="login" value="{{ old('login') }}" required autocomplete="on" autofocus>

                        @error('login')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <input id="password" type="password" placeholder="{{ __('Password') }}" class="w-full p-2 border rounded-lg @error('password') border-red-600 @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="w-full">
                        <button type="submit" class="w-full py-3 text-white bg-violet-700 hover:bg-violet-800 transition-all rounded-lg">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-main-layout>
