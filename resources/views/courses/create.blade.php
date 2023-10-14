<h2>Register course</h2>
<form method="POST" action="/courses">
            @csrf
            <div class="mb-6">
                <label for="code" class="inline-block text-lg mb-2">Course Code</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="code" placeholder="First Name" value="{{old('code')}}" />
                @error('code')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Course Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" placeholder="Course title" value="{{old('title')}}" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="semester" class="inline-block text-lg mb-2">Semester</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="semester" placeholder="Other Names" value="{{old('semester')}}" />
                @error('semester')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="session" class="inline-block text-lg mb-2">Session</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="session" placeholder="Registration Number" value="{{old('session')}}" />
                @error('session')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Save
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
