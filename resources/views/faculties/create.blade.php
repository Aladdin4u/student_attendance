<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Create Faculty</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Faculty Datails</h2>
        <form method="POST" action="/faculties" class="space-y-4">
            @csrf

            <div class="w-full">
                <x-label for="name">Faculty Name</x-label>
                <x-input type="text" name="name" placeholder="Enter Faculty Name" value="{{old('name')}}" />
                @error('name')
                <x-alert>{{$message}}</x-alert>
                @enderror
            </div>

            <x-row>
                <x-button type="submit" class="w-60">
                    Save
                </x-button>
                <x-link href="/faculties/manage" class="w-60">
                    Back
                </x-link>
            </x-row>
        </form>
    </div>
</x-layout>