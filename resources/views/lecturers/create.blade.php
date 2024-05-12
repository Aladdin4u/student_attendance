<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Create Lecturer</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Lecturer Datails</h2>
        <form method="POST" action="/lecturers" class="space-y-4">
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
                    <input name="role" type="text" value="lecturer" hidden>
                    <input name="role" type="text" required value="lecturer" hidden>
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