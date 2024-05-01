<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Edit Course</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Course Datails</h2>
        <form method="POST" action="/courses/{{$course->id}}" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="w-full flex flex-row items-center justify-between space-x-4">

                <div class="basis-1/2">
                    <label for="code" class="block text-sm font-medium leading-6 text-gray-900">Course Code</label>
                    <input type="text" name="code" placeholder="Course Code" value="{{$course->code}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6" />
                    @error('code')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Course Title</label>
                    <input type="text" name="title" placeholder="Course Title" value="{{$course->title}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6" />
                    @error('title')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </div>

            <div class="w-full flex flex-row items-center justify-between space-x-4">

                <div class="basis-1/2">
                    <label for="department_id" class="block text-sm font-medium leading-6 text-gray-900">Department</label>
                    <div>
                        <select name="department_id" id="department_id" class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
                            <option value="" class="hover:bg-sky-100">-- select department --</option>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}" class="hover:bg-sky-100" {{$course->department_id == $department->id ? 'selected' : ''}}>{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('department_id')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <label for="level_id" class="block text-sm font-medium leading-6 text-gray-900">Level</label>
                    <div>
                        <select name="level_id" id="level_id" class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
                            <option value="" class="hover:bg-sky-100">-- select level --</option>
                            @foreach($levels as $level)
                            <option value="{{$level->id}}" class="hover:bg-sky-100" {{$course->level_id == $level->id ? 'selected' : ''}}>{{$department->name}}>{{$level->semester}} semster - {{$level->name}} level</option>
                            @endforeach
                        </select>
                    </div>
                    @error('level_id')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </div>
            <div class="w-full flex flex-row items-center justify-between space-x-4">

                <div class="basis-1/2">
                    <label for="unit" class="block text-sm font-medium leading-6 text-gray-900">Course Unit</label>
                    <input type="number" name="unit" placeholder="Session" value="{{$course->unit}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6" />
                    @error('unit')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </div>

            <div class="mx-auto flex flex-row items-center justify-between">
                <button type="submit" class="flex w-60 justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
                    Save
                </button>
                <a href="/courses/manage" class="flex w-60 justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
                    Back
                </a>
            </div>
        </form>
    </div>
</x-layout>