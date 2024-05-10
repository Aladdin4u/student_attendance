<x-layout>
    <div id="message"></div>
    <h1 class="text-lg font-semibold text-left mb-4">Register Lecture</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Register lecture for this semester</h2>

        <form method="POST" action="/coursesoffer/lecturer" class="space-y-4">
            @csrf

            <div class="w-full">
                <input type="text" name="user_id" value="{{$user}}" hidden>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Course</label>
                <select name="course_id" id="course_id" class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
                    <option value="" class="hover:bg-sky-100">-- select course --</option>
                    @unless($courses->isEmpty())
                    @foreach($courses as $course)
                    <option value="{{$course->id}}" class="hover:bg-sky-100">{{$course->title}}</option>
                    @endforeach
                    @endunless
                </select>
            </div>

            <div class="mx-auto flex flex-row items-center justify-between space-x-2">
                <button type="submit" class="flex w-60 justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
                    Save
                </button>
            </div>
        </form>

        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Code</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody>
                @unless($lectures->isEmpty())
                @foreach($lectures as $lecture)
                <tr class="border-gray-300">
                    <td class="p-2 border-t border-b border-gray-300 text-lg">
                        {{$lecture->title}}
                    </td>
                    <td class="p-2 border-t border-b border-gray-300 text-lg">
                        {{$course->code}}
                    </td>
                    <td class="p-2 border-t border-b border-gray-300 text-lg">
                        {{$course->unit}}
                    </td>
                    <td class="p-2 border-t border-b border-gray-300 text-lg">
                        <form method="POST" action="/coursesoffers/{{$lecture->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">
                                <svg class="flex-shrink-0 w-6 h-6 stroke-red-500 transition duration-75 hover:stroke-red-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998 M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97 M18.8499 9.14001L18.1999 19.21C18.0899 20.78 17.9999 22 15.2099 22H8.7899C5.9999 22 5.9099 20.78 5.7999 19.21L5.1499 9.14001 M10.3301 16.5H13.6601 M9.5 12.5H14.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="p-2 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No courses Found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </div>
</x-layout>