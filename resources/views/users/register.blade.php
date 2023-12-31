<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/js/app.js')
  <title>Sign up</title>
</head>

<body class="h-full">
  <main class="flex min-h-full flex-col justify-center px-6 py-8 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm border rounded-xl py-12 px-6">


      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-16 w-auto" src={{asset("avatar.png")}} alt="Your Company">
        <h2 class="mt-2 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign up</h2>
      </div>

      <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/register" method="POST">
          @csrf
          <div>
            <label for="role" class="block text-sm font-medium leading-6 text-gray-900">Role</label>
            <div class="mt-2">
              <select name="role" id="role" class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
                <option value="" class="hover:bg-sky-100">-- select role --</option>
                <option value="admin" class="hover:bg-sky-100">Admin</option>
                <option value="lecturer" class="hover:bg-sky-100">Lecturer</option>
              </select>
            </div>
            @error('role')
            <x-alert>{{$message}}</x-alert>
            @enderror
          </div>

          <div>
            <label for="firstName" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
            <div class="mt-2">
              <input id="firstName" name="firstName" type="text" autocomplete="firstName" placeholder="Enter first name" required value="{{old('firstName')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
            </div>
            @error('firstName')
            <div class="flex items-center p-4 mt-1 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
              <x-alert>{{$message}}</x-alert>
              @enderror
            </div>

            <div>
              <label for="lastName" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
              <div class="mt-2">
                <input id="lastName" name="lastName" type="text" autocomplete="lastName" placeholder="Enter last name" required value="{{old('lastName')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
              </div>
              @error('lastName')
              <x-alert>{{$message}}</x-alert>
              @enderror
            </div>

            <div>
              <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" placeholder="Enter email address" required value="{{old('email')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
              </div>
              @error('email')
              <x-alert>{{$message}}</x-alert>
              @enderror
            </div>

            <div>
              <label for="phoneNumber" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
              <div class="mt-2">
                <input id="phoneNumber" name="phoneNumber" type="tel" pattern="[0-9]{11}" autocomplete="phoneNumber" placeholder="Enter phone number" required value="{{old('phoneNumber')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
              </div>
              @error('phoneNumber')
              <x-alert>{{$message}}</x-alert>
              @enderror
            </div>

            <div>
              <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
              <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Enter password" required value="{{old('password')}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
              </div>
              @error('password')
              <x-alert>{{$message}}</x-alert>
              @enderror
            </div>

            <div>
              <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
              <div class="mt-2">
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

        <p class="mt-2 text-center text-sm text-gray-500">
          Already have an account?
          <a href="/login" class="font-semibold leading-6 text-sky-400 hover:text-sky-500">Login</a>
        </p>
      </div>
    </div>
  </main>
  <x-flash-message />
</body>

</html>