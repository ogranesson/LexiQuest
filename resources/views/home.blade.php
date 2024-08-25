<x-main-layout title="LinguaQuest - Home Page">
    <div class="p-4 rounded-lg bg-white">
    <div class="text-center">
        <p class="text-violet-900 text-3xl font-bold mb-3">Welcome to LinguaQuest!</p>
        <a class="text-white p-3 rounded-lg text-xl font-bold bg-violet-900" href="{{ route('create-topic') }}">Create a topic</a>
    </div>
    <div class="pagination my-4">
        {{ $topics->links() }}
    </div>
    @foreach ($topics as $topic)
        <a href="{{ route('topic', ['id' => $topic->id]) }}">
        <div class="topic mb-4 p-4 border border-gray-200 rounded">
            <h2 class="text-xl font-bold">{{ $topic->name }}</h2>
            <div class="text-sm text-gray-500">
                <img src="{{ asset($topic->photo) }}" alt="{{ $topic->username }}'s photo" class="inline-block rounded-full w-8 h-8" />
                <span>Posted by: {{ $topic->username }}</span>
            </div>
        </div>
        </a>
    @endforeach
    </div>
</x-main-layout>
