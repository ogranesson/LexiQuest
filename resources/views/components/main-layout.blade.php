@props(['title', 'scripts'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? "LinguaQuest" }}</title>
    @vite('resources/css/app.css')

    @if (isset($scripts) && is_array($scripts))
        @foreach ($scripts as $script)
            <script src="{{ $script }}"></script>
        @endforeach
    @endif
</head>
<body class="bg-white">
    <div class="bg-white border-b border-b-black h-12 px-2 flex items-center sticky">
        <p>LinguaQuest</p>

        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="group relative">
                <a id="navbarDropdown" class="" href={{ route('view-profile', ['username' => Auth::user()->username] )}} role="button">
                    {{ Auth::user()->first_name }}
                </a>

                <div class="opacity-0 absolute -translate-y-2 group-hover:opacity-100 group-hover:translate-y-0 transition" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </div>
    <div class="p-3">
        {{ $slot }} {{-- whatever is pasted between the <x-main-layout> tags is saved as $slot --}}
    </div>
</body>
</html>