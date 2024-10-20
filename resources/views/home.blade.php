<x-main-layout title="LexiQuest - Home Page">
    <div class="flex flex-row gap-2">
        <div class="p-4 rounded-lg bg-white w-5/6">
            <div class="text-center mb-3">
                <p class="text-violet-900 text-3xl font-bold mb-3">Welcome to LexiQuest!</p>
                <a class="text-white p-3 rounded-lg text-xl font-bold bg-violet-900" href="{{ route('create-topic') }}">Create a topic</a>
            </div>
            @if (isset($selected_category))
                <p class="ml-4 text-xl">Viewing posts of category: <b>{{ $selected_category->name }}</b></p>
            @endif
            <div class="pagination my-4">
                {{ $topics->links() }}
            </div>
            @foreach ($topics as $topic)
                <a href="{{ route('topic', ['id' => $topic->id]) }}">
                    <div class="topic mb-4 p-4 border border-gray-200 rounded">
                        <h2 class="text-xl font-bold">{{ $topic->name }}</h2>
                        <div class="text-sm text-gray-500">
                            <img src="{{ asset($topic->photo ?? 'default-photo.png') }}" alt="{{ $topic->username }}'s photo" class="inline-block rounded-full w-8 h-8" />
                            <span>Posted by: {{ $topic->username }} &#x2022; 
                                @if(!empty($topic->categories))
                                    Category: {{ implode(', ', explode(',', $topic->categories)) }}
                                @endif
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="p-4 rounded-lg bg-white w-1/6">
            <p class="text-violet-900 font-bold">View by category:</p>
            <hr class="bg-red-600">
            @foreach ($categories as $category)
                <p class="my-2"><a class="hover:underline" href={{ route('category-view', ['category_id' => $category->id]) }}>{{ $category->name }}</a></p>
            @endforeach

            @if (isset($selected_category))
            <a href="/">
                <div class="p-2 w-full bg-violet-900 text-white font-bold text-center rounded-lg">
                    Back to home view
                </div>
            </a>
            @endif
        </div>
    </div>
</x-main-layout>
