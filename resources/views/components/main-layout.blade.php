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

<body class="bg-white">
    <div class="bg-white border-b border-b-black top-0 flex w-full justify-between items-center sticky">
        <a class="block px-8" href="{{ route('home') }}">LinguaQuest</p>
        <ul class="m-0 p-0 after:content-[''] after:block after:clear-both">
        @guest
            @if (Route::has('login'))
                <li class="float-left text-center">
                    <a class="block px-8 py-3 hover:bg-slate-300" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="float-left text-center">
                    <a class="block px-8 py-3 hover:bg-slate-300" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="group relative float-left text-center">
                <a class="block px-8 py-3 hover:bg-slate-300" href="{{ route('view-profile', ['username' => Auth::user()->username] )}}">
                    {{ Auth::user()->first_name }}
                </a>


                <div class="opacity-0 left-0 absolute w-full -translate-y-2 group-hover:opacity-100 group-hover:translate-y-0 transition">
                    <a class="block py-3 hover:bg-slate-300"  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </div>
            </li>
            @if (Auth::user())
                <li class="float-left text-center">
                    <a class="block px-8 py-3 hover:bg-slate-300" href="{{ route('view-dashboard') }}">
                        Admin Dashboard
                    </a>
                </li>
            @endif
        @endguest
        </ul>
    </div>
    <div class="p-3">
        {{ $slot }} {{-- whatever is pasted between the <x-main-layout> tags is saved as $slot --}}
    </div>
</body>
</html>
