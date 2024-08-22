<x-main-layout title="LinguaQuest - Home Page">
    <p class="bg-blue-200 p-2 text-green-900 font-bold">Welcome to LinguaQuest!</p>
    <p class="bg-blue-200 p-2 text-red-900 font-bold">Thank you for logging in!</p>
    <a class="bg-blue-200 p-2 text-red-900 font-bold block hover:text-blue-800" href="{{ route('create-topic') }}">Create a topic</a>

    <div class="container">
        <h1>Topics</h1>
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

        <div class="pagination mt-4">
            {{ $topics->links() }}
        </div>
    </div>
</x-main-layout>
