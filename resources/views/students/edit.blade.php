<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Edit Students</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Student Datails</h2>
        <form method="POST" action="/students/{{$student->id}}" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="w-full flex flex-row items-center justify-between space-x-4">

                <div class="basis-1/2">
                    <label for="firstName" class="block text-sm font-medium leading-6 text-gray-900">First Name</label>
                    <input type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6" name="firstName" placeholder="First Name" value="{{$student->firstName}}" />
                    @error('firstName')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <label for="lastName" class="block text-sm font-medium leading-6 text-gray-900">Last Name</label>
                    <input type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6" name="lastName" placeholder="Last Name" value="{{$student->lastName}}" />
                    @error('lastName')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </div>


            <div class="w-full flex flex-row items-center justify-between space-x-4">
                <div class="basis-1/2">
                    <label for="otherName" class="block text-sm font-medium leading-6 text-gray-900">Other Name</label>
                    <input type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6" name="otherName" placeholder="Other Names" value="{{$student->otherName}}" />
                    @error('otherName')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>

                <div class="basis-1/2">
                    <label for="regNumber" class="block text-sm font-medium leading-6 text-gray-900">Reg Number</label>
                    <input type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6" name="regNumber" placeholder="Registration Number" value="{{$student->regNumber}}" />
                    @error('regNumber')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </div>

            <div class="basis-1/2">
                <label for="department" class="block text-sm font-medium leading-6 text-gray-900">
                    Department
                </label>
                <select name="department" id="department" class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
                    <option value="" class="hover:bg-sky-100">-- select department --</option>
                    <option value="100" {{$student->department == 100 ? 'selected' : '' }} class="hover:bg-sky-100">100</option>
                    <option value="200" {{$student->department == 200 ? 'selected' : '' }} class="hover:bg-sky-100">200</option>
                    <option value="300" {{$student->department == 300 ? 'selected' : '' }} class="hover:bg-sky-100">300</option>
                    <option value="400" {{$student->department == 400 ? 'selected' : '' }} class="hover:bg-sky-100">400</option>
                </select>
                @error('department')
                <x-alert>{{$message}}</x-alert>
                @enderror
            </div>

            <div class="mx-auto flex flex-row items-center justify-between">
                <button type="submit" class="flex w-60 justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
                    Save
                </button>
                <a href="/students/manage" class="flex w-60 justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
                    Back
                </a>
            </div>
        </form>
    </div>
</x-layout>