<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">Profile</h1>
  <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-lg">

    <div class="w-full flex items-center justify-between">
      <h2 class="font-semibold text-left"> welcome {{$user['firstName']}}</h2>
      <div x-data="{ open: false }">
        <button x-on:click="open = ! open" class="flex justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">Register Course</button>
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
                <form method="POST" action="/lecturers/courses" class="space-y-6">
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
                    <input type="text" name="user_id" value="{{$user['id']}}" class="sr-only">
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
    </div>

    <h2 class="font-semibold">Courses List</h2>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      @unless($user_courses->isEmpty())
      <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            #
          </th>
          <th scope="col" class="px-6 py-3">
            Course Code
          </th>
          <th scope="col" class="px-6 py-3">
            Course Title
          </th>
          <th scope="col" class="px-6 py-3">
            <span>Delete</span>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($user_courses as $user_course)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{$loop->index + 1}}
          </th>
          <td class="px-6 py-4">
            {{$user_course['code']}}
          </td>
          <td class="px-6 py-4">
            {{$user_course['title']}}
          </td>
          <td class="px-6 py-4">
            <form method="POST" action="/lecturers_courses/{{$user_course['id']}}">
              @csrf
              @method('DELETE')
              <button>
                <svg class="flex-shrink-0 w-6 h-6 stroke-red-500 transition duration-75 hover:stroke-red-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998 M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97 M18.8499 9.14001L18.1999 19.21C18.0899 20.78 17.9999 22 15.2099 22H8.7899C5.9999 22 5.9099 20.78 5.7999 19.21L5.1499 9.14001 M10.3301 16.5H13.6601 M9.5 12.5H14.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

              </button>
            </form>
          </td>
        </tr>
        @endforeach
        @else
        <tr class="bg-white border-0 dark:bg-gray-800 dark:border-gray-700">
          <td colspan="9" class="flex-col px-6 py-4 text-center">
            <button class="text-gray-400">
              <svg class="flex-shrink-0 w-10 h-10 stroke-gray-500 transition duration-75 hover:stroke-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" d="M7.875 14.25l1.214 1.942a2.25 2.25 0 001.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 011.872 1.002l.164.246a2.25 2.25 0 001.872 1.002h2.092a2.25 2.25 0 001.872-1.002l.164-.246A2.25 2.25 0 0116.954 9h4.636M2.41 9a2.25 2.25 0 00-.16.832V12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 01.382-.632l3.285-3.832a2.25 2.25 0 011.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0021.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 002.25 2.25z" />
              </svg>
            </button>
            <p class="font-medium text-lg"> No Data</p>
          </td>
        </tr>
      </tbody>
    </table>
    @endunless
  </div>



</x-layout>