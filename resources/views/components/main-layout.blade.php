@props(['title', 'scripts'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>{{ $title ?? "LinguaQuest" }}</title>
    @vite('resources/css/app.css')

    @if (isset($scripts) and is_array($scripts))
        @foreach ($scripts as $script)
            <script src="{{ $script }}"></script>
        @endforeach
    @endif
</head>

<body class="bg-violet-200">
    <div class="bg-violet-400 top-0 flex w-full justify-between items-center fixed drop-shadow-lg z-10">
        <a class="block px-8 h-full text-white text-xl" href="{{ route('home') }}"><span class="text-violet-900 font-bold">Lingua</span>Quest</p>
        <ul class="m-0 p-0 after:content-[''] flex flex-row items-center after:block after:clear-both">
        @guest
            @if (Route::has('login'))
                <li class="text-center">
                    <a class="block px-8 py-3 hover:bg-violet-700 hover:text-white transition-all text-violet-900" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="text-center">
                    <a class="block px-8 py-3 hover:bg-violet-700 hover:text-white transition-all text-violet-900" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="group relative text-center">
                <a class="flex px-8 py-3 hover:bg-violet-700 hover:text-white transition-all text-violet-900 row items-center" href="{{ route('view-profile', ['username' => Auth::user()->username] )}}">
                    <img src="{{ asset(Auth::user()->photo) }}" alt="{{ Auth::user()->username }}'s photo" class="inline-block rounded-full w-6 h-6" /><span class="mx-3">{{ Auth::user()->first_name }}</span><img src={{asset('arrow.png')}} class="w-3 h-3" alt="arrow">
                </a>


                <div class="invisible opacity-0 left-0 -translate-y-3 absolute w-full group-hover:visible group-hover:opacity-100 group-hover:translate-y-0 transition-all">
                    <a class="block py-3 bg-violet-400 hover:bg-violet-700 hover:text-white text-violet-900"  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </li>
            @if (Auth::user()->is_admin === 1)
                <li class="text-center">
                    <a class="block px-8 py-3 hover:bg-violet-700 hover:text-white transition-all text-violet-900" href="{{ route('view-dashboard') }}">
                        Admin Dashboard
                    </a>
                </li>
            @endif
        @endguest
        </ul>
    </div>
    <div class="p-4 mt-12">
        {{ $slot }} {{-- whatever is pasted between the <x-main-layout> tags is saved as $slot --}}
    </div>
</body>
</html>
