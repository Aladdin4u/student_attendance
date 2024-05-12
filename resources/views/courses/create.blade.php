<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Create Course</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Course Datails</h2>
        <form method="POST" action="/courses" class="space-y-4">
            @csrf
            <x-row>
                <div class="basis-1/2">
                    <x-label for="code">Course Code</x-label>
                    <x-input type="text" name="code" placeholder="Course Code" value="{{old('code')}}" />
                    @error('code')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <x-label for="title">Course Title</x-label>
                    <x-input type="text" name="title" placeholder="Course Title" value="{{old('title')}}" />
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
                            <x-option value="{{$department->id}}">{{$department->name}}</x-option>
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
                            <x-option value="{{$level->id}}">{{$level->name}} level</x-option>
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
                    <x-input type="number" name="unit" placeholder="Session" value="{{old('unit')}}" />
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