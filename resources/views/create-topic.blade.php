<x-main-layout title="Create topic"
    :scripts="[
        'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js',
        asset('js/create-topic.js')
    ]">
    <form method="POST" action="{{ route('submit-topic')}}">
        @csrf
        @method('POST')
        <label for="name">What's the title?</label>
        <input type="text" id="name" name="name" />

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

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
        
        @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror


        <button type="submit" id="submit">Submit</button>
    </form>
</x-main-layout>
