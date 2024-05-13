@props([
"label",
])
<div x-on:click="open = ! open" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#15ACD9] hover:text-white group">
        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
            {{$slot}}
        </svg>

        <span class="flex-1 ml-3 whitespace-nowrap">{{$label}}</span>
        <svg class="w-4 h-4 text-gray-500 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"></path>
        </svg>
    </div>