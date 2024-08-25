<x-main-layout title="Topic - {{ $topic->name }}"
    :scripts="[
        'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js',
        asset('js/post-edit.js')
    ]">
    <div class="p-4 bg-white rounded-lg">
        <p class="text-2xl font-bold">
            {{ $topic->name }}
        </p>
        <p>
            Posted by <a href="{{ route('view-profile', ['username' => $author->username]) }}"><b>{{ $author->username }}</b></a>
            | Category:
            @foreach ($categories as $category)
                {{ $category->name }}
            @endforeach
        </p>

        <p>Replies:</p>

        @foreach ($posts as $post)
            <div class="border border-gray-300 rounded-lg mb-3 p-2">
                <div class="post visible">
                    <p class="post-content font-bold"> {{ $post->content }} </p>
                    <p>@if($post->is_banned == 1)[banned user]@else <a href={{ route('view-profile', ['username' => $post->username])}}> {{ $post->username}} </a> @endif on {{ $post->created_on }}</p>
                    @if ($post->username == Auth::user()->username)
                    <button class="edit">Edit</button>
                    <form method="POST" class="delete-form" action="{{ route('delete-post', ['post_id' => $post->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">Delete</button>
                    </form>
                </div>

                <form class="edit-post" method="POST" action="{{ route('edit-post', ['post_id' => $post->id]) }}">
                    @csrf
                    @method('PUT')
                    <textarea class="post-edit-text" name="content"></textarea>
                    <button class="save" type="submit">Save</button>
                    <button class="cancel">Cancel</button>
                </form>
            </div>
            @endif
                </div>
            </div>

        @endforeach

        <form id="post-form" method="POST" action="{{ route('submit-post', ['id' => $topic->id]) }}">
            @csrf
            @method('POST')
            <textarea class="border w-1/2 h-20" id="post-text" name="post-text" autocomplete="off"></textarea><br>
            <button type="submit" id="post-submit" class="bg-violet-900 text-white font-bold p-2 rounded-lg">Post</button>
        </form>
    </div>
</x-main-layout>
