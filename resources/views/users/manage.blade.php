<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">All Lecturers</h1>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="w-full flex items-center justify-between p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800">
      <span class="font-semibold text-left">
        All Lecturers

      </span>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
          </svg>
        </div>
        <form action="/users/manage/">
          <input type="search" id="search" class="rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6 px-4 pl-10" placeholder="Search...">
        </form>
      </div>
    </div>
    @unless(count($users) == 0)
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
            Email Address
          </th>
          <th scope="col" class="px-6 py-3">
            Phone Number
          </th>
          <th scope="col" class="px-6 py-3">
            <span>View</span>
          </th>
          <th scope="col" class="px-6 py-3">
            <span>Edit</span>
          </th>
          <th scope="col" class="px-6 py-3">
            <span>Delete</span>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{$loop->index + 1}}
          </th>
          <td class="px-6 py-4">
            {{$user['firstName']}}
          </td>
          <td class="px-6 py-4">
            {{$user['lastName']}}
          </td>
          <td class="px-6 py-4">
            {{$user['email']}}
          </td>
          <td class="px-6 py-4">
            {{$user['phoneNumber']}}
          </td>
          <td class="px-6 py-4">
            <a href="/users/{{$user['id']}}">
              <svg class="flex-shrink-0 w-6 h-6 stroke-gray-500 transition duration-75 hover:stroke-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.5799 12C15.5799 13.98 13.9799 15.58 11.9999 15.58C10.0199 15.58 8.41992 13.98 8.41992 12C8.41992 10.02 10.0199 8.42004 11.9999 8.42004C13.9799 8.42004 15.5799 10.02 15.5799 12Z M12.0001 20.27C15.5301 20.27 18.8201 18.19 21.1101 14.59C22.0101 13.18 22.0101 10.81 21.1101 9.39997C18.8201 5.79997 15.5301 3.71997 12.0001 3.71997C8.47009 3.71997 5.18009 5.79997 2.89009 9.39997C1.99009 10.81 1.99009 13.18 2.89009 14.59C5.18009 18.19 8.47009 20.27 12.0001 20.27Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>

            </a>
          </td>
          <td class="px-6 py-4">
            <a href="/users/{{$user['id']}}/edit">

              <button>
                <svg class="flex-shrink-0 w-6 h-6 stroke-gray-500 transition duration-75 hover:stroke-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.2601 3.6L5.0501 12.29C4.7401 12.62 4.4401 13.27 4.3801 13.72L4.0101 16.96C3.8801 18.13 4.7201 18.93 5.8801 18.73L9.1001 18.18C9.5501 18.1 10.1801 17.77 10.4901 17.43L18.7001 8.74C20.1201 7.24 20.7601 5.53 18.5501 3.44C16.3501 1.37 14.6801 2.1 13.2601 3.6Z M11.8899 5.05C12.3199 7.81 14.5599 9.92 17.3399 10.2 M3 22H21" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

              </button>
            </a>
          </td>
          <td class="px-6 py-4">
            <form method="POST" action="/users/{{$user['id']}}">
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
        <tr>
          <td colspan="9" class="flex-col bg-white px-6 py-4 text-center">
            {{$users->links()}}
          </td>
        </tr>
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

  <div class="container">
        <div class="card">
            <div class="card-header">Manage Users</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
</x-layout>

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush