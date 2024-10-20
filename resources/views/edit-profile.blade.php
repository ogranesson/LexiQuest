<x-main-layout title="Edit profile - LexiQuest">
    <div class="flex items-center my-10">
        <div class="bg-white align-middle rounded-lg p-4 w-1/2 m-auto drop-shadow-xl shadow-violet-950">
            <div class="block text-center text-3xl text-violet-700 font-bold mb-6">{{ __('Edit profile') }}</div>
                @if(session('alert'))
                    <div class="alert alert-warning">
                        {{ session('alert') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('save-profile', ['username' => Auth::user()->username]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex row justify-between">

                    <div class="mb-5 w-1/3">
                        <label for="first_name" class="block text-violet-800 ml-2 mb-2">{{ __('First name') }}<span class="text-red-600"> *</span></label>
                        <input id="first_name" type="text" placeholder="{{ __('First name') }}" class="w-full p-2 border rounded-lg @error('first_name') border-red-600 @enderror" name="first_name" value="{{ Auth::user()->first_name }}" required autocomplete="off">

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-5 w-1/3 mx-2">
                        <label for="middle_name" class="block text-violet-800 ml-2 mb-2">{{ __('Middle name') }}</label>
                        <input id="middle_name" type="text" placeholder="{{ __('Middle name') }}" class="w-full p-2 border rounded-lg @error('middle_name') border-red-600 @enderror" name="middle_name" value="{{ Auth::user()->middle_name }}" autocomplete="off">

                        @error('middle_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-5 w-1/3">
                        <label for="last_name" class="block text-violet-800 ml-2 mb-2">{{ __('Last name') }}<span class="text-red-600"> *</span></label>
                        <input id="last_name" type="text" placeholder="{{ __('Last name') }}" class="w-full p-2 border rounded-lg @error('last_name') border-red-600 @enderror" name="last_name" value="{{ Auth::user()->last_name }}" required autocomplete="off">

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    </div>

                    <div class="mb-5">
                        <label for="username" class="block text-violet-800 ml-2 mb-2">{{ __('Username') }}<span class="text-red-600"> *</span></label>
                        <input id="username" type="text" placeholder="{{ __('Username') }}" class="w-full p-2 border rounded-lg @error('username') border-red-600 @enderror" name="username" value="{{ Auth::user()->username }}" required autocomplete="off">

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="country" class="block text-violet-800 ml-2 mb-2">{{ __('Select your country') }}<span class="text-red-600"> *</span></label>
                        <select id="country" class="w-full p-2 border rounded-lg @error('country') is-invalid @enderror" name="country" required>
                            <option value="Not specified">Not specified</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}" @if($country == Auth::user()->country) selected @endif>{{ $country }}</option>
                            @endforeach
                        </select>

                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="email" class="block text-violet-800 ml-2 mb-2">{{ __('E-mail') }}<span class="text-red-600"> *</span></label>
                        <input id="email" type="text" placeholder="{{ __('E-mail') }}" class="w-full p-2 border rounded-lg @error('email') border-red-600 @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="off">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="photo" class="block text-violet-800 ml-2 mb-2">{{ __('Profile picture') }}</label>
                        <div class="col-md-6">
                            <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" onchange="previewImage(event)" accept="image/*" name="photo">

                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div id="image-preview" class="mt-4">
                            <img id="preview" src="#" alt="Image Preview" class="hidden w-32 h-32 object-cover">
                        </div>
                    </div>

                    <div class="w-full">
                        <button type="submit" class="w-full py-3 text-white bg-violet-700 hover:bg-violet-800 transition-all rounded-lg">
                            {{ __('Save profile') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('preview');
                output.src = reader.result;
                output.classList.remove('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-main-layout>
