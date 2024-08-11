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
                </div>
            </div>
        @endforeach
    </div>
</x-main-layout>