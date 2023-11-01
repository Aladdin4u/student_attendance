<x-layout>
    <h1>edit courses</h1>
    <form method="POST" action="/courses/{{$course->id}}">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="code" class="inline-block text-lg mb-2">Code</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="code" placeholder="First Name" value="{{$course->code}}" />
            @error('code')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">Title</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" placeholder="Last Name" value="{{$course->title}}" />
            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="semester" class="inline-block text-lg mb-2">Semester</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="semester" placeholder="Other Names" value="{{$course->semester}}" />
            @error('semester')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="session" class="inline-block text-lg mb-2">Session</label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="session" placeholder="Registration Number" value="{{$course->session}}" />
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
</x-layout>