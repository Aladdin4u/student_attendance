<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')
  <title>Sign up</title>
  <style>
    .bg-image {
      background: url(bg-right.png), url(bg-center.png), url(bg-left.png);
      background-repeat: no-repeat, no-repeat, no-repeat;
      background-position: top right, center, bottom left;
      background-color: black;
    }
  </style>
</head>

<body>
  <main class="grid grid-cols-1 md:grid-cols-5 min-h-screen">
    <div class="hidden md:grid col-span-2 place-items-center content-center space-y-4 items-center justify-center text-white bg-image">
      <div class="flex space-x-2">
        <svg class="w-8 h-8 flex-shrink-0 w-6 h-6 text-sky-500 transition duration-75" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path d="M2.7 15V9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M10.05 2.53001L4.03002 6.46001C2.10002 7.72001 2.10002 10.54 4.03002 11.8L10.05 15.73C11.13 16.44 12.91 16.44 13.99 15.73L19.98 11.8C21.9 10.54 21.9 7.73001 19.98 6.47001L13.99 2.54001C12.91 1.82001 11.13 1.82001 10.05 2.53001Z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M5.63012 13.08L5.62012 17.77C5.62012 19.04 6.60012 20.4 7.80012 20.8L10.9901 21.86C11.5401 22.04 12.4501 22.04 13.0101 21.86L16.2001 20.8C17.4001 20.4 18.3801 19.04 18.3801 17.77V13.13" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <span class="self-center text-md">Attendify</span>
      </div>
      <h2 class="text-2xl font-md">Hello there!</h2>
      <p class="text-wrap w-60 text-center">Enter your personal details and start this journey with us</p>
    </div>
    <div class="grid md:col-span-3 content-center sm:mx-auto sm:w-full sm:max-w-sm py-4 px-6">

      <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign up</h2>

      <div class="sm:mx-auto sm:w-full sm:max-w-sm space-y-2">
        <p class="text-center text-sm text-gray-500">
          Already have an account?
          <a href="/login" class="font-semibold leading-6 text-sky-400 hover:text-sky-500">Login</a>
        </p>
        <form class="space-y-2" action="/register" method="POST">
          @csrf
          <div>
            <label for="role" class="block text-sm font-medium leading-6 text-gray-900">Role</label>
            <div>
              <select name="role" id="role" class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
                <option value="" class="hover:bg-sky-100">-- select role --</option>
                <option value="admin" class="hover:bg-sky-100">Admin</option>
                <option value="lecturer" class="hover:bg-sky-100">Lecturer</option>
                <option value="student" class="hover:bg-sky-100">Student</option>
              </select>
            </div>
            @error('role')
            <x-alert>{{$message}}</x-alert>
            @enderror
          </div>

          <div>
            <label for="firstName" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
            <div>
              <input id="firstName" name="firstName" type="text" autocomplete="firstName" placeholder="Enter first name" required value="{{old('firstName')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
            </div>
            @error('firstName')
            <div class="flex items-center p-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <x-alert>{{$message}}</x-alert>
              @enderror
            </div>

            <div>
              <label for="lastName" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
              <div>
                <input id="lastName" name="lastName" type="text" autocomplete="lastName" placeholder="Enter last name" required value="{{old('lastName')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
              </div>
              @error('lastName')
              <x-alert>{{$message}}</x-alert>
              @enderror
            </div>

            <div>
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
              <div>
                <input id="email" name="email" type="email" autocomplete="email" placeholder="Enter email address" required value="{{old('email')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
              </div>
              @error('email')
              <x-alert>{{$message}}</x-alert>
              @enderror
            </div>

            <div>
              <label for="phoneNumber" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
              <div>
                <input id="phoneNumber" name="phoneNumber" type="tel" pattern="[0-9]{11}" autocomplete="phoneNumber" placeholder="Enter phone number" required value="{{old('phoneNumber')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
              </div>
              @error('phoneNumber')
              <x-alert>{{$message}}</x-alert>
              @enderror
            </div>

            <div>
              <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              <div>
                <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Enter password" required value="{{old('password')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
              </div>
              @error('password')
              <x-alert>{{$message}}</x-alert>
              @enderror
            </div>

            <div>
              <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
              <div>
                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" placeholder="Enter password" required value="{{old('password_confirmation')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
              </div>
              @error('password_confirmation')
              <x-alert>{{$message}}</x-alert>
              @enderror
            </div>

            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">Sign up</button>
            </div>
        </form>
      </div>
    </div>
  </main>
  <x-flash-message />
</body>

</html>