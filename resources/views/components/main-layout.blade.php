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
    </div>
    <div class="p-3">
        {{ $slot }} {{-- whatever is pasted between the <x-main-layout> tags is saved as $slot --}}
    </div>
</body>
</html>