<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">Take attendance for ({{date('Y-m-d')}})</h1>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="w-full flex items-center justify-between p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800">
      <span class="font-semibold text-left">
        All Students
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
          <th scope="col" class="px-6 py-3">#</th>
          <th scope="col" class="px-6 py-3">First Name</th>
          <th scope="col" class="px-6 py-3">Last Name</th>
          <th scope="col" class="px-6 py-3">Other Name</th>
          <th scope="col" class="px-6 py-3">Reg Number</th>
          <th scope="col" class="px-6 py-3">Course Code</th>
          <th scope="col" class="px-6 py-3">level</th>
          <th scope="col" class="px-6 py-3">Check</th>
        </tr>
      </thead>
      <tbody>
        @foreach($attendances as $attendance)

        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{$loop->index + 1}}
          </th>
          <td class="px-6 py-4">{{$attendance['firstName']}}</td>
          <td class="px-6 py-4">{{$attendance['lastName']}}</td>
          <td class="px-6 py-4">{{$attendance['otherName']}}</td>
          <td class="px-6 py-4">{{$attendance['regNumber']}}</td>
          <td class="px-6 py-4">{{$attendance['code']}}</td>
          <td class="px-6 py-4">{{$attendance['level']}}</td>
          <td class="px-6 py-4 text-center">
            <form id="form" method="POST" action="/attendances">
              @csrf
              <input type="text" name="student_id" value="{{$attendance['student_id']}}" style="display: none;">
              <input type="text" name="course_id" value="{{$attendance['id']}}" style="display: none;">
              <input type="text" name="date" value="{{date('Y-m-d')}}" style="display: none;">
              <input id="btn" type="checkbox" name="is_present" id="is_present" @click="console.log('clicked')">
              <button type="submit">submit</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
    <p>No attendance availabe</p>
    @endunless
  </div>
</x-layout>