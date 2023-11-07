<x-layout>
  <h1 class="text-lg font-semibold">View Class Attendance</h1>
  <div class="w-full flex flex-col p-5 my-4 rounded-lg text-gray-900 bg-white space-y-2 dark:text-white dark:bg-gray-800">
    <span class="font-bold">
      View Class Attendance
    </span>
    <form action="" class="space-y-2">
      <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Select Date</label>
      <input type="date" name="date" id="date" class="block w-60 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
      <button type="submit" class="flex justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">View Attendance</button>
    </form>
  </div>

  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="w-full flex items-center justify-between p-5 text-gray-900 bg-white space-y-2 dark:text-white dark:bg-gray-800">
      <span class="font-semibold">
        Class Attendance
      </span>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
        </div>
        <form action="/students/manage/">
          <input type="search" id="search" class="rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6 px-4 pl-10" placeholder="Search...">
        </form>
      </div>
    </div>
    @unless(count($attendances) == 0)
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            #
          </th>
          <th scope="col" class="px-6 py-3">
            First Name
          </th>
          <th scope="col" class="px-6 py-3">
            Last Name
          </th>
          <th scope="col" class="px-6 py-3">
            Other Name
          </th>
          <th scope="col" class="px-6 py-3">
            Reg Number
          </th>
          <th scope="col" class="px-6 py-3">
            Course Code
          </th>
          <th scope="col" class="px-6 py-3">
            Level
          </th>
          <th scope="col" class="px-6 py-3">
            Status
          </th>
          <th scope="col" class="px-6 py-3">
            Date
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($attendances as $attendance)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{$loop->index + 1}}
          </th>
          <td class="px-6 py-4">
            {{$attendance['firstName']}}
          </td>
          <td class="px-6 py-4">
            {{$attendance['lastName']}}
          </td>
          <td class="px-6 py-4">
            {{$attendance['otherName']}}
          </td>
          <td class="px-6 py-4">
            {{$attendance['regNumber']}}
          </td>
          <td class="px-6 py-4">
            {{$attendance['code']}}
          </td>
          <td class="px-6 py-4">
            {{$attendance['level']}}
          </td>
          <td class="px-6 py-4">
            <span class="p-1 rounded-sm text-white {{ $attendance['is_present'] === 'present' ? 'bg-green-600': 'bg-red-600'}}">
              {{ $attendance['is_present'] === 'present' ? "Present" : "Absent" }}
            </span>
          </td>
          <td class="px-6 py-4">
            {{$attendance['date']}}
          </td>
        </tr>
        @endforeach
        @else
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <td colspan="8" class="flex-col px-6 py-4 text-center">
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