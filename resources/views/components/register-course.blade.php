@props([
"courses",
"userId"
])
<div x-data="{ open: false }" class="mt-2 self-center">
    <button x-on:click="open = ! open" class="rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">Register your Course</button>
    <!-- Main modal -->
    <div x-show="open" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full top-32 mx-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" x-on:click="open = false" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Register Course</h3>
                    <form method="POST" action="/students/courses" class="space-y-6">
                        @csrf
                        <div>
                            <label for="course_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
                            <select name="course_id" id="course_id" class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
                                <option value="" class="hover:bg-sky-100">-- select course --</option>
                                @unless($courses->isEmpty())
                                @foreach($courses as $course)
                                <option value="{{$course->id}}" class="hover:bg-sky-100">{{$course->title}}</option>
                                @endforeach
                                @endunless
                            </select>
                            <input type="text" name="user_id" value="{{$userId}}" class="sr-only">
                        </div>
                        <button x-on:click="open = false" type="submit" class="w-full text-white bg-sky-400 hover:bg-sky-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                </div>
                <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>