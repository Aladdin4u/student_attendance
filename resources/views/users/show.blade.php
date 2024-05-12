<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">Profile</h1>
  <div class="space-y-4">

    <div class="w-full p-5 text-gray-900 bg-white rounded-lg space-y-2">
      <x-row>
        <h2 class="text-md font-bold">Personal Details</h2>
        <a href="/users/{{$contact[0]->id}}/edit"><button>
            <svg class="flex-shrink-0 w-6 h-6 stroke-gray-500 transition duration-75 hover:stroke-gray-700" viewBox="0 0 24 24" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M16.04 3.02001L8.16 10.9C7.86 11.2 7.56 11.79 7.5 12.22L7.07 15.23C6.91 16.32 7.68 17.08 8.77 16.93L11.78 16.5C12.2 16.44 12.79 16.14 13.1 15.84L20.98 7.96001C22.34 6.60001 22.98 5.02001 20.98 3.02001C18.98 1.02001 17.4 1.66001 16.04 3.02001Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M14.91 4.1499C15.58 6.5399 17.45 8.4099 19.85 9.0899" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button></a>
      </x-row>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="flex space-x-4">
          <h6 class="font-semibold text-[#15ACD9]">First Name:</h6>
          <span class="text-gray-900">{{$contact[0]->firstName}}</span>
        </div>
        <div class="flex space-x-4">
          <h6 class="font-semibold text-[#15ACD9]">Last Name:</h6>
          <span class="text-gray-900">{{$contact[0]->lastName}}</span>
        </div>
        <div class="flex space-x-4">
          <h6 class="font-semibold text-[#15ACD9]">Other Name:</h6>
          <span class="text-gray-900">{{$contact[0]->otherName}}</span>
        </div>
        <div class="flex space-x-4">
          <h6 class="font-semibold text-[#15ACD9]">Email Address:</h6>
          <span class="text-gray-900">{{$user->email}}</span>
        </div>
        <div class="flex space-x-4">
          <h6 class="font-semibold text-[#15ACD9]">Phone Number: </h6>
          <span class="text-gray-900">{{$contact[0]->phoneNumber}}</span>
        </div>
      </div>
    </div>

    <div class="w-full p-5 text-gray-900 bg-white rounded-lg space-y-2">
      @if($user->role === "student")
      @unless($admissions->isEmpty())
      @foreach($admissions as $admission)
      <x-row>
        <h2 class="text-md font-bold">Admission Details</h2>
        <a href="/students/{{$admission->student_id}}/edit"><button>
            <svg class="flex-shrink-0 w-6 h-6 stroke-gray-500 transition duration-75 hover:stroke-gray-700" viewBox="0 0 24 24" stroke="currentColor" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M16.04 3.02001L8.16 10.9C7.86 11.2 7.56 11.79 7.5 12.22L7.07 15.23C6.91 16.32 7.68 17.08 8.77 16.93L11.78 16.5C12.2 16.44 12.79 16.14 13.1 15.84L20.98 7.96001C22.34 6.60001 22.98 5.02001 20.98 3.02001C18.98 1.02001 17.4 1.66001 16.04 3.02001Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M14.91 4.1499C15.58 6.5399 17.45 8.4099 19.85 9.0899" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button></a>
      </x-row>
      <div class="grid grid-cols-1 gap-4">
        <div class="flex space-x-4">
          <h6 class="font-semibold text-[#15ACD9]">Reg Number: </h6>
          <span class="text-gray-900">{{$admission->regNumber}}</span>
        </div>
        <div class="flex space-x-4">
          <h6 class="font-semibold text-[#15ACD9]">Department: </h6>
          <span class="text-gray-900">{{$admission->departmentName}}</span>
        </div>
        <div class="flex space-x-4">
          <h6 class="font-semibold text-[#15ACD9]">Faculty: </h6>
          <span class="text-gray-900">{{$faculty[0]->name}}</span>
        </div>

        @endforeach
        @endunless

        @unless($programmees->isEmpty())
        @foreach($programmees as $programmee)
        <div class="flex space-x-4">
          <h6 class="font-semibold text-[#15ACD9]">Session: </h6>
          <span class="text-gray-900">{{$programmee->session}}</span>
        </div>
        <div class="flex space-x-4">
          <h6 class="font-semibold text-[#15ACD9]">Current semester: </h6>
          <span class="text-gray-900">{{$programmee->semester}} semester</span>
        </div>
        <div class="flex space-x-4">
          <h6 class="font-semibold text-[#15ACD9]">Current level: </h6>
          <span class="text-gray-900">{{$programmee->name}} Level</span>
        </div>
        @endforeach
        @endunless
      </div>
    </div>

    <div class="w-full p-5 text-gray-900 bg-white rounded-lg space-y-2">
      <h2 class="text-md font-bold">Course Registration</h2>
      <p class="text-gray-600">Click on the button below to register courses</p>
      <x-link class="bg-sky-500 hover:bg-sky-400 w-32 text-white" href="/coursesoffer/create/{{$user->id}}">
        Register courses
      </x-link>
    </div>
    @endif

    @if($user->role === "lecturer")
    <div class="w-full p-5 text-gray-900 bg-white rounded-lg space-y-2">
      <h2 class="text-md font-bold">Course Registration</h2>
      <p class="text-gray-600">Click on the button below to register courses</p>
      <x-link class="bg-sky-500 hover:bg-sky-400 w-32 text-white" href="/coursesoffer/lecturer/{{$user->id}}">
        Register courses
      </x-link>
    </div>
    @endif

    <div class="w-full p-5 text-gray-900 bg-white rounded-lg space-y-2">
      <h2 class="text-md font-bold">Settings</h2>
      <p class="text-gray-600">Click on the button below to change password</p>
      <x-link class="bg-red-500 hover:bg-red-400 w-40 text-white" href="/forgot-password">
        Change Password
      </x-link>
    </div>


  </div>
</x-layout>