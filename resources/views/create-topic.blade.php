<x-main-layout title="Create topic"
    :scripts="[
        'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js',
        asset('js/create-topic.js')
    ]">
    <form method="POST" action="{{ route('submit-topic')}}">
        <label for="title">What's the title?</label>
        <input type="text" id="title" name="title" />

        <div class="flex row">
        
        <div id="selectedCategories" class="flex row"></div>
        <div id="selectMenuDiv" class="hidden">
            <select id="selectMenu" name="category">
                <option value="0">Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button name="confirm" id="addConfirm" type="button" class="px-2 bg-slate-600 text">&#x2713;</button>
        </div>
        <button name="add" id="addCategory" type="button" class="px-2 bg-slate-600 text">+</button>
        </div>
    </form>
</x-main-layout>
