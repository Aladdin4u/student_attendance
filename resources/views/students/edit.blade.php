<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Edit Admission Students</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Student Admission Datails</h2>
        <form method="POST" action="/students/{{$student->id}}" class="space-y-4">
            @csrf
            @method('PUT')

            <x-row>
                <div class="basis-1/2">
                    <x-label for="department_id">Department</x-label>
                    <div>
                        <x-select name="department_id" id="department_id">
                            <x-option value="">-- select Department --</x-option>
                            @unless($departments->isEmpty())
                            @foreach($departments as $department)
                            <option value="{{$department->id}}" class="hover:bg-sky-100" {{$student->department_id == $department->id ? 'selected' : ''}}>{{$department->name}}</option>
                            @endforeach
                            @endunless
                        </x-select>
                    </div>
                </div>

                <div class="basis-1/2">
                    <x-label for="regNumber">Reg Number</x-label>
                    <x-input type="text" name="regNumber" placeholder="Registration Number" value="{{$student->regNumber}}" readonly />
                    @error('regNumber')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </x-row>

            <x-row>
                <x-button type="submit" class="w-60">
                    Save
                </x-button>
                <x-link href="/students/manage" class="w-60">
                    Back
                </x-link>
            </x-row>
        </form>
    </div>
</x-layout>