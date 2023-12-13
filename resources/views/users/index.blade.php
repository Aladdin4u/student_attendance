<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
</head>
<title>DataTable</title>
</head>

<body>
<div>
      <h2 class="font-semibold">Users List</h2>
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        @unless($users->isEmpty())
        <thead class="text-xs text-gray-700 titlecase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              #
            </th>
            <th scope="col" class="px-6 py-3">
              Full Name
            </th>
            <th scope="col" class="px-6 py-3">
              email
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{$loop->index + 1}}
            </th>
            <td class="px-6 py-3">
              {{$user['firstName']}}
            </td>
            <td class="px-6 py-3">
              {{$user['email']}}
            </td>
          </tr>
          @endforeach
          @else
          <tr class="bg-white border-0 dark:bg-gray-800 dark:border-gray-700">
            <td colspan="9" class="flex-col px-6 py-3 text-center">
              <button class="text-gray-400">
                <svg class="flex-shrink-0 w-10 h-10 stroke-gray-500 transition duration-75 hover:stroke-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M7.875 14.25l1.214 1.942a2.25 2.25 0 001.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 011.872 1.002l.164.246a2.25 2.25 0 001.872 1.002h2.092a2.25 2.25 0 001.872-1.002l.164-.246A2.25 2.25 0 0116.954 9h4.636M2.41 9a2.25 2.25 0 00-.16.832V12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 01.382-.632l3.285-3.832a2.25 2.25 0 011.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0021.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 002.25 2.25z" />
                </svg>
              </button>
              <p class="font-medium text-lg"> No Data</p>
            </td>
          </tr>
        </tbody>
        @endunless
      </table>
    </div>
</body>

</html>