<x-main-layout title="404 not found">
    @if (isset($message))
    <p>{{ $message }}</p>
    @else
    <p>Such a place doesn't exist!</p>
    @endif
</x-main-layout>
