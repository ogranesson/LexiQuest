<x-main-layout title="{{$user->first_name }} {{ $user->last_name }}'s profile">
    @if (session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif
    <div class="p-4 rounded-lg bg-white h-screen">
        <div class="flex flex-row items-center">
            <img src="{{ asset($user->photo) }}" width="400px" class="rounded-full" alt="{{$user->first_name }} {{ $user->last_name }}'s profile" />
            <div class="flex flex-col ml-8 gap-2">
                <p class="text-8xl font-bold text-violet-700">{{ $user->first_name }} @if($user->middle_name) {{ $user->middle_name }} @endif {{ $user->last_name }}</p>
                <div class="text-3xl text-slate-500">{{ $user->username}} &#x2022; Joined {{ $diff }} ago &#x2022; From {{ $user->country}}
                    @if(Auth::user()->is_admin == 1)
                        @if($user->is_banned == 1)
                            &#x2022; 
                            <form class="inline" method="POST" action="{{ route('unban-user', ['username' => $user->username])}}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-3xl text-red-500 underline">Unban user</button>
                            </form>
                        @endif

                        @if($user->is_banned == 0 and $user->id != Auth::user()->id)
                            &#x2022; 
                            <form class="inline" method="POST" action="{{ route('ban-user', ['username' => $user->username])}}">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="text-3xl text-red-500 underline">Ban user</button>
                            </form>
                        @endif
                    @endif
                    @if(Auth::user()->id == $user->id)
                        &#x2022; 
                        <a href="{{ route('edit-profile', ['username' => Auth::user()->username]) }}">Edit profile</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
