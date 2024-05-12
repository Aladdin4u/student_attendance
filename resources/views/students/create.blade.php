<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Student Registration</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Student Registration</h2>
        <form method="POST" action="/students" class="space-y-4">
            @csrf

            <x-row>
                <div class="basis-1/2">
                    <x-label for="firstName">First Name</x-label>
                    <x-input id="firstName" name="firstName" type="text" autocomplete="firstName" placeholder="Enter first name" required value="{{old('firstName')}}" />
                    @error('firstName')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>

                <div class="basis-1/2">
                    <x-label for="lastName">Last Name</x-label>
                    <x-input id="lastName" name="lastName" type="text" autocomplete="lastName" placeholder="Enter last name" required value="{{old('lastName')}}" />
                    @error('lastName')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </x-row>

            <x-row>
                <div class="basis-1/2">
                    <x-label for="otherName">Other Name</x-label>
                    <x-input id="otherName" name="otherName" type="text" autocomplete="otherName" placeholder="Enter other name" required value="{{old('otherName')}}" />
                    @error('otherName')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <x-label for="email">Email address</x-label>
                    <x-input id="email" name="email" type="email" autocomplete="email" placeholder="Enter email address" required value="{{old('email')}}" />
                    @error('email')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </x-row>

            <x-row>
                <div class="basis-1/2">
                    <x-label for="phoneNumber">Phone Number</x-label>
                    <x-input id="phoneNumber" name="phoneNumber" type="tel" pattern="[0-9]{11}" autocomplete="phoneNumber" placeholder="Enter phone number" required value="{{old('phoneNumber')}}" />
                    @error('phoneNumber')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <x-label for="department_id">Department</x-label>
                    <div>
                        <x-select name="department_id" id="department_id">
                            <x-option value="">-- select Department --</x-option>
                            @unless($departments->isEmpty())
                            @foreach($departments as $department)
                            <x-option value="{{$department->id}}">{{$department->name}}</x-option>
                            @endforeach
                            @endunless
                        </x-select>
                    </div>
                </div>
            </x-row>

            <x-row>
                <div class="basis-1/2">
                    <x-label for="level_id">Level</x-label>
                    <div>
                        <x-select name="level_id" id="level_id">
                            <x-option value="">-- select Level --</x-option>
                            @unless($levels->isEmpty())
                            @foreach($levels as $level)
                            <x-option value="{{$level->id}}"> {{$level->name}} level </x-option>
                            @endforeach
                            @endunless
                        </x-select>
                    </div>
                </div>
                <div class="basis-1/2">
                    <x-label for="section_id">Academic Session</x-label>
                    <div>
                        <x-select name="section_id" id="section_id">
                            <x-option value="">-- select Academic Session --</x-option>
                            @unless($sections->isEmpty())
                            @foreach($sections as $section)
                            <x-option value="{{$department->id}}">{{$section->session}}</x-option>
                            @endforeach
                            @endunless
                        </x-select>
                    </div>
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