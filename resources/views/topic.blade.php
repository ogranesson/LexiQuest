<x-main-layout title="Topic - {{ $topic->name }}"
    :scripts="[
        'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js',
        asset('js/post-edit.js')
    ]">
    <div class="text-black">
        <p>
            This is topic {{ $topic->id }}!
            The title of this topic is {{ $topic->name }}!
            Posted by: {{ $author->first_name}}
            Category:
            @foreach ($categories as $category)
                {{ $category->name }}
            @endforeach
        </p>

        @foreach ($posts as $post)
            <div class="post-container">
                <p> Posted by <b> {{ $post->first_name}} {{ $post->last_name }} on {{ $post->created_on }} </b></p>
                <div class="post visible">
                    <p class="post-content"> {{ $post->content }} </p>
                    <button class="edit">Edit</button>
                    <form method="POST" class="delete-form" action="{{ route('delete-post', ['id' => $topic->id, 'post_id' => $post->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">Delete</button>
                    </form>
                </div>

                <form class="edit-post hidden" method="POST" action="{{ route('edit-post', ['id' => $topic->id, 'post_id' => $post->id]) }}">
                    @csrf
                    @method('POST')
                    <textarea class="post-edit-text" name="content"></textarea>
                    <button class="save" type="submit">Save</button>
                    <button class="cancel">Cancel</button>
                </form>
            </div>
        @endforeach

        <form id="post-form" method="POST" action="{{ route('submit-post', ['id' => $topic->id]) }}">
            @csrf
            @method('POST')
            <textarea id="post-text" name="post-text" autocomplete="off"></textarea>
            <button type="submit" id="post-submit">Post</button>
        </form>
    </div>
</x-main-layout>