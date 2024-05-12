<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Edit Department</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Department Datails</h2>
        <form method="POST" action="/departments/{{$department->id}}" class="space-y-4">
            @csrf
            @method('PUT')
            <x-row>

                <div class="basis-1/2">
                    <x-label for="name">Department Name</x-label>
                    <x-input type="text" name="name" placeholder="Department Code" value="{{$department->name}}" />
                    @error('name')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <x-label for="faculty_id" class="block text-sm font-medium leading-6 text-gray-900">Faculty</x-label>
                    <div>
                        <x-select name="faculty_id" id="faculty_id">
                            <x-option value="" class="hover:bg-sky-100">-- select faculty --</x-option>
                            @unless($faculties->isEmpty())
                            @foreach($faculties as $faculty)
                            <option class="hover:bg-sky-100" value="{{$faculty->id}}" {{$faculty->id == $department->faculty_id ? 'selected' : ''}}>{{$faculty->name}}</option>
                            @endforeach
                            @endunless
                        </x-select>
                    </div>
                    @error('faculty_id')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </x-row>

            <x-row>
                <x-button type="submit" class="w-60">
                    Save
                </x-button>
                <x-link href="/departments/manage" class="w-60">
                    Back
                </x-link>
            </x-row>
        </form>
    </div>
</x-layout>