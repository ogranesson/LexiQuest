<x-main-layout title="{{$user->first_name }} {{ $user->last_name }}'s profile">
    <img src="{{ asset($user->photo) }}" alt="{{$user->first_name }} {{ $user->last_name }}'s profile" />
    <p>First name: {{ $user->first_name }}</p>
    @if($user->middle_name)
        <p>Middle name: {{ $user->middle_name }}</p>
    @endif
    <p>Last name: {{ $user->last_name }}</p>
    <p>Created {{ $diff }}</p>
</x-main-layout>
