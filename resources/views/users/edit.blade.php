<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Edit Personal Details</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Personal Datails</h2>
        <form method="POST" action="/users/{{$user->id}}" class="space-y-4">
            @csrf
            @method('PUT')

            <x-row>
                <div class="basis-1/2">
                    <x-label for="firstName">First Name</x-label>
                    <x-input type="text" name="firstName" placeholder="First Name" value="{{$user->firstName}}" />
                    @error('firstName')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
                <div class="basis-1/2">
                    <x-label for="lastName">Last Name</x-label>
                    <x-input type="text" name="lastName" placeholder="Last Name" value="{{$user->lastName}}" />
                    @error('lastName')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </x-row>


            <x-row>
                <div class="basis-1/2">
                    <x-label for="otherName">Other Name</x-label>
                    <x-input type="text" name="otherName" placeholder="Other Names" value="{{$user->otherName}}" />
                    @error('otherName')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>

                <div class="basis-1/2">
                    <x-label for="phoneNumber">Phone Number</x-label>
                    <x-input type="text" name="phoneNumber" placeholder="Registration Number" value="{{$user->phoneNumber}}" />
                    @error('phoneNumber')
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