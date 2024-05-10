<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">Profile</h1>
  <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-lg">

    <div class="w-full flex items-center justify-between">
      <h2 class="font-semibold text-left"> welcome {{$contact[0]->firstName}}</h2>
    </div>

    <div class="space-y-2 mt-4">
      <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold">Personal Details</h2>
        <a href="/users/{{$contact[0]->id}}/edit"><button>
            <svg class="flex-shrink-0 w-6 h-6 stroke-gray-500 transition duration-75 hover:stroke-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.2601 3.6L5.0501 12.29C4.7401 12.62 4.4401 13.27 4.3801 13.72L4.0101 16.96C3.8801 18.13 4.7201 18.93 5.8801 18.73L9.1001 18.18C9.5501 18.1 10.1801 17.77 10.4901 17.43L18.7001 8.74C20.1201 7.24 20.7601 5.53 18.5501 3.44C16.3501 1.37 14.6801 2.1 13.2601 3.6Z M11.8899 5.05C12.3199 7.81 14.5599 9.92 17.3399 10.2 M3 22H21" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
            </svg></button></a>
      </div>
      <div class="w-full mt-10">
        <p class="font-semibold text-sky-500">First Name: <span class="text-gray-900">{{$contact[0]->firstName}}</span></p>
        <p class="font-semibold text-sky-500">Last Name: <span class="text-gray-900">{{$contact[0]->lastName}}</span></p>
        <p class="font-semibold text-sky-500">Other Name: <span class="text-gray-900">{{$contact[0]->otherName}}</span></p>
        <p class="font-semibold text-sky-500">Email: <span class="text-gray-900">{{$user->email}}</span></p>
        <p class="font-semibold text-sky-500">Phone Number: <span class="text-gray-900">{{$contact[0]->phoneNumber}}</span></p>
      </div>

      @if($user->role === "student")
      @unless($admissions->isEmpty())
      @foreach($admissions as $admission)
      <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold">Admission Details</h2>
        <a href="/students/{{$admission->student_id}}/edit"><button>
            <svg class="flex-shrink-0 w-6 h-6 stroke-gray-500 transition duration-75 hover:stroke-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path d="M13.2601 3.6L5.0501 12.29C4.7401 12.62 4.4401 13.27 4.3801 13.72L4.0101 16.96C3.8801 18.13 4.7201 18.93 5.8801 18.73L9.1001 18.18C9.5501 18.1 10.1801 17.77 10.4901 17.43L18.7001 8.74C20.1201 7.24 20.7601 5.53 18.5501 3.44C16.3501 1.37 14.6801 2.1 13.2601 3.6Z M11.8899 5.05C12.3199 7.81 14.5599 9.92 17.3399 10.2 M3 22H21" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
            </svg></button></a>
      </div>
      <div class="w-full mt-10">
        <p class="font-semibold text-sky-500">Reg Number: <span class="text-gray-900">{{$admission->regNumber}}</span></p>
        <p class="font-semibold text-sky-500">Department: <span class="text-gray-900">{{$admission->departmentName}}</span></p>
        <p class="font-semibold text-sky-500">Faculty: <span class="text-gray-900">{{$faculty[0]->name}}</span></p>
      </div>
      @endforeach
      @else
      <div></div>
      <a href="#" class="flex justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
        complete your admission
      </a>
      @endunless

      @unless($programmees->isEmpty())
      @foreach($programmees as $programmee)
      <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold">Programmee</h2>
      </div>
      <div class="w-full mt-10">
        <p class="font-semibold text-sky-500">Academic Session: <span class="text-gray-900">{{$programmee->start_date}}</span></p>
        <p class="font-semibold text-sky-500">Current semester: <span class="text-gray-900">{{$programmee->semester}} semester</span></p>
        <p class="font-semibold text-sky-500">Current level: <span class="text-gray-900">{{$programmee->name}} level</span></p>
      </div>
      @endforeach
      @endunless
      @endif

      <a href="/coursesoffer/create/{{$user->id}}">
        <div class="mt-2">
          <h2 class="text-xl font-bold">Course registration</h2>
          <p>Register your courses here</p>
        </div>
      </a>

      <div class="space-y-2">
        <h2 class="text-xl font-bold">Settings</h2>
        <a href="/forgot-password" class="font-semibold text-red-400 hover:text-red-500">Change your password</a>
        <form action="/logout" method="POST">
          @csrf
          <button class="flex justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
            Logout
          </button>
        </form>
      </div>


    </div>
</x-layout>