<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Edit Level</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Level Datails</h2>
        <form method="POST" action="/levels/{{$level->id}}" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="w-full flex flex-row items-center justify-between space-x-4">
                <div class="basis-1/2">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Level name</label>
                    <input type="text" name="name" placeholder="100" pattern="\d{3}" value="{{$level->name}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6" />
                    @error('name')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <label for="semester" class="block text-sm font-medium leading-6 text-gray-900">Semester</label>
                    <div>
                        <select name="semester" id="semester" class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
                            <option value="" class="hover:bg-sky-100">-- select semester --</option>
                            <option value="first" class="hover:bg-sky-100" {{$level->semester == 'first' ? 'selected' : ''}}>First</option>
                            <option value="second" class="hover:bg-sky-100" {{$level->semester == 'second' ? 'selected' : ''}}>Second</option>
                        </select>
                    </div>
                    @error('semester')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </div>

            <div class="mx-auto flex flex-row items-center justify-between space-x-2">
                <button type="submit" class="flex w-60 justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
                    Save
                </button>
                <a href="/levels/manage" class="flex w-60 justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
                    Back
                </a>
            </div>
    </div>

    </form>
    </div>
</x-layout>