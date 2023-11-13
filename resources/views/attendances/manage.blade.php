<x-layout>
  <h1 class="text-lg font-semibold">Overall Students Attendance</h1>
  <div class="w-full flex flex-col p-5 my-4 rounded-lg text-gray-900 bg-white space-y-2 dark:text-white dark:bg-gray-800">
    <h2 class="font-bold">
      View Overall Students Attendance
    </h2>
    <form action="" class="space-y-2">
      <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Select Date</label>
      <input type="date" name="date" id="date" class="block w-60 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
      <button type="submit" class="flex justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">View Attendance</button>
    </form>
  </div>

  <div class="card-body bg-white p-3 space-y-4 shadow-md rounded-lg space-y-4">
    <h2 class="font-semibold text-left">
      Overall Attendance
    </h2>
    {{ $dataTable->table() }}
  </div>

  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush
</x-layout>