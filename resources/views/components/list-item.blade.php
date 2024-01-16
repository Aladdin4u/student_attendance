@props([
    "text",
    "icon",
    "link",
    ])
<li>
    <a href="{{$link}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-sky-100 hover:text-sky-500 dark:hover:bg-sky-700 group {{ request()->is('{{$link}}') ? 'bg-sky-100 text-sky-500' : ''}}">
    {{$icon}}

        <span class="ml-3">{{$text}}</span>
    </a>
</li>