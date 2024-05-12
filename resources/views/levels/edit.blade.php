<x-layout>
    <h1 class="text-lg font-semibold text-left mb-4">Edit Level</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Level Datails</h2>
        <form method="POST" action="/levels/{{$level->id}}" class="space-y-4">
            @csrf
            @method('PUT')
            <x-row>
                <div class="basis-1/2">
                    <x-label for="name">Level name</x-label>
                    <x-input type="text" name="name" placeholder="100" pattern="\d{3}" value="{{$level->name}}" />
                    @error('name')
                    <x-alert>{{$message}}</x-alert>
                    @enderror
                </div>
            </x-row>

            <x-row>
                <x-button type="submit" class="w-60">
                    Save
                </x-button>
                <x-link href="/levels/manage" class="w-60">
                    Back
                </x-link>
            </x-row>
    </div>

    </form>
    </div>
</x-layout>