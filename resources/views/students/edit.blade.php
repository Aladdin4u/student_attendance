<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Edit Admission Students</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Student Admission Datails</h2>
        <form method="POST" action="/students/{{$student->id}}" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="w-full flex flex-row items-center justify-between space-x-4">
                <div class="basis-1/2">
                    <label for="department_id" class="block text-sm font-medium leading-6 text-gray-900">Department</label>
                    <div>
                        <select name="department_id" id="department_id" class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
                            <option value="" class="hover:bg-sky-100">-- select Department --</option>
                            @unless($departments->isEmpty())
                            @foreach($departments as $department)
                            <option value="{{$department->id}}" class="hover:bg-sky-100" {{$student->department_id == $department->id ? 'selected' : ''}}>{{$department->name}}</option>
                            @endforeach
                            @else
                            <a href="/departments/create" class="flex justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
                                add department
                            </a>
                            @endunless
                        </select>
                    </div>
                </div>

                <div class="basis-1/2">
                    <label for="regNumber" class="block text-sm font-medium leading-6 text-gray-900">Reg Number</label>
                    <input type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6" name="regNumber" placeholder="Registration Number" value="{{$student->regNumber}}" readonly />
                    @error('regNumber')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
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