<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Edit Course</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Course Datails</h2>
        <form method="POST" action="/courses/{{$course->id}}" class="space-y-4">
            @csrf
            @method('PUT')
            <x-row>
                <div class="basis-1/2">
                    <x-label for="code">Course Code</x-label>
                    <x-input type="text" name="code" placeholder="Course Code" value="{{$course->code}}" />
                    @error('code')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <x-label for="title">Course Title</x-label>
                    <x-input type="text" name="title" placeholder="Course Title" value="{{$course->title}}" />
                    @error('title')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </x-row>

            <x-row>
                <div class="basis-1/2">
                    <x-label for="department_id">Department</x-label>
                    <div>
                        <x-select name="department_id" id="department_id">
                            <x-option value="">-- select department --</x-option>
                            @unless($departments->isEmpty())
                            @foreach($departments as $department)
                            <option value="{{$department->id}}" class="hover:bg-sky-100" {{$course->department_id == $department->id ? 'selected' : ''}}>{{$department->name}}</option>
                            @endforeach
                            @endunless
                        </x-select>
                    </div>
                    @error('department_id')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <x-label for="level_id">Level</x-label>
                    <div>
                        <x-select name="level_id" id="level_id">
                            <x-option value="">-- select level --</x-option>
                            @unless($levels->isEmpty())
                            @foreach($levels as $level)
                            <option value="{{$level->id}}" class="hover:bg-sky-100" {{$course->level_id == $level->id ? 'selected' : ''}}>{{$level->name}} level</option>
                            @endforeach
                            @endunless
                        </x-select>
                    </div>
                    @error('level_id')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </x-row>

            <x-row>
                <div class="basis-1/2">
                    <x-label for="unit">Course Unit</x-label>
                    <x-input type="number" name="unit" placeholder="Session" value="{{$course->unit}}" />
                    @error('unit')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </x-row>

            <x-row>
                <x-button type="submit" class="w-60">
                    Save
                </x-button>
                <x-link href="{{url()->previous()}}" class="w-60">
                    Back
                </x-link>
            </x-row>
        </form>
    </div>
</x-layout>