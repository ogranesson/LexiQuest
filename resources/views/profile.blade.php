<x-main-layout title="{{$user->first_name }} {{ $user->last_name }}'s profile">
    @if (session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif
    <img src="{{ asset($user->photo) }}" alt="{{$user->first_name }} {{ $user->last_name }}'s profile" />
    <p>{{ $user->first_name }} @if($user->middle_name) {{ $user->middle_name }} @endif {{ $user->last_name }}</p>
    <p>Created {{ $diff }}</p>
    @if($user->is_banned == 1)
        <p class="text-red-600">This user has been banned.</p>
        <form method="POST" action="{{ route('unban-user', ['username' => $user->username])}}">
            @csrf
            @method('PUT')
            <button type="submit">Unban user</button>
        </form>
    @else
        <form method="POST" action="{{ route('ban-user', ['username' => $user->username])}}">
            @csrf
            @method('PUT')
            <button type="submit">Ban user</button>
        </form>
    @endif
</x-main-layout>
