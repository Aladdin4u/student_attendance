<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Edit Academic Session</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Academic Session Datails</h2>
        <form method="POST" action="/sections/{{$section->id}}" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="w-full flex flex-row items-center justify-between space-x-4">

                <div class="basis-1/2">
                    <label for="semester" class="block text-sm font-medium leading-6 text-gray-900">Semester</label>
                    <select name="semester" id="semester" class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
                        <option value="" class="hover:bg-sky-100">-- select semester --</option>
                        <option value="first" {{$section->semester == 'first' ? 'selected' : '' }} class="hover:bg-sky-100">First Semester</option>
                        <option value="second" {{$section->semester == 'second' ? 'selected' : '' }} class="hover:bg-sky-100">Second Semester</option>
                    </select>
                    @error('semester')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <label for="year" class="block text-sm font-medium leading-6 text-gray-900">Session/Year</label>
                    <input type="text" name="year" placeholder="2023/2034" pattern="\d{4}/\d{4}" value="{{$section->year}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6" />
                    @error('year')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </div>

            <div class="w-full flex flex-row items-center justify-between space-x-4">
                <div class="basis-1/2">
                    <label for="start_date" class="block text-sm font-medium leading-6 text-gray-900">Start date</label>
                    <input type="date" name="start_date" placeholder="Section Code" value="{{$section->start_date}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6" />
                    @error('start_date')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <label for="end_date" class="block text-sm font-medium leading-6 text-gray-900">End Date</label>
                    <input type="date" name="end_date" placeholder="End Date" value="{{$section->end_date}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6" />
                    @error('end_date')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </div>

            <div class="mx-auto flex flex-row items-center justify-between space-x-2">
                <button type="submit" class="flex w-60 justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
                    Save
                </button>
                <a href="/sections/manage" class="flex w-60 justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
                    Back
                </a>
            </div>
    </div>

    </form>
    </div>
</x-layout>