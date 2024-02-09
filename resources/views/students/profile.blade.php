<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">Profile</h1>
  <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-lg space-y-4">

    <div class="w-full flex items-center justify-between">
      <h2 class="font-semibold text-left"> Welcome back {{$user['firstName']}}!</h2>

    </div>

    <div class="space-y-2 mt-10">
      <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold">Bio</h2>
        <a href="/students/{{$student_form[0]->id}}/edit" class="flex justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">Edit profile</a>
      </div>
      @unless($student_form->isEmpty())
      @foreach($student_form as $student)
      <div class="w-full mt-10">
        <p class="font-semibold text-sky-500">First Name: <span class="text-gray-900">{{$student->firstName}}</span></p>
        <p class="font-semibold text-sky-500">Last Name: <span class="text-gray-900">{{$student->lastName}}</span></p>
        <p class="font-semibold text-sky-500">Other Name: <span class="text-gray-900">{{$student->otherName}}</span></p>
        <p class="font-semibold text-sky-500">Email: <span class="text-gray-900">{{$user->email}}</span></p>
        <p class="font-semibold text-sky-500">Phone Number: <span class="text-gray-900">{{$user->phoneNumber}}</span></p>
        <p class="font-semibold text-sky-500">Registration Number: <span class="text-gray-900">{{$student->regNumber}}</span></p>
        <p class="font-semibold text-sky-500">Department: <span class="text-gray-900">{{$student->department}}</span></p>
      </div>
      @endforeach
      @else
      <div>Complete your registration <a href="/students/create">link</a>
      </div>
      @endunless
    </div>

    <div class="space-y-2">
      <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold">Registrated Course</h2>
        <x-register-course :courses="$courses" :userId="$user['id']" />
      </div>
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        @unless($user_courses->isEmpty())
        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="p-2">
              #
            </th>
            <th scope="col" class="p-2">
              Course Code
            </th>
            <th scope="col" class="p-2">
              Course Title
            </th>
            <th scope="col" class="p-2">
              <span>Delete</span>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($user_courses as $user_course)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="p-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{$loop->index + 1}}
            </th>
            <td class="p-2">
              {{$user_course['code']}}
            </td>
            <td class="p-2">
              {{$user_course['title']}}
            </td>
            <td class="p-2">
              <form method="POST" action="/students_courses/{{$user_course['id']}}">
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
            <td colspan="9" class="flex-col items-center px-6 py-4  text-center">
              <button class="text-gray-400">
                <svg class="flex-shrink-0 w-10 h-10 stroke-gray-500 transition duration-75 hover:stroke-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M7.875 14.25l1.214 1.942a2.25 2.25 0 001.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 011.872 1.002l.164.246a2.25 2.25 0 001.872 1.002h2.092a2.25 2.25 0 001.872-1.002l.164-.246A2.25 2.25 0 0116.954 9h4.636M2.41 9a2.25 2.25 0 00-.16.832V12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 01.382-.632l3.285-3.832a2.25 2.25 0 011.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0021.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 002.25 2.25z" />
                </svg>
              </button>
              <p class="font-medium text-lg"> No Data</p>
              <x-register-course :courses="$courses" :userId="$user['id']" />
            </td>
          </tr>
        </tbody>
        @endunless
      </table>
    </div>
  </div>




</x-layout>