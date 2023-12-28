@props([
"title",
"desc",
"icon",
])
<div class="flex items-center justify-between px-4 py-2 rounded-lg bg-white dark:bg-gray-800">
    <div class="space-y-4">
        <h3 class="text-sm text-gray-500">{{$title}}</h3>
        <h4 class="font-medium">{{$desc}}</h4>
    </div>
    <div class="flex items-center justify-center p-2 rounded-full bg-sky-500 text-white">
        {{ $icon }}
    </div>
</div>