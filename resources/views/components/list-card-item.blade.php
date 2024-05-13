@props([
"label",
"link",
])

@php
$str = substr($link, 1);
$isActive = request()->is($str) ? 1 : 0;
@endphp

<li><a href="{{$link}}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#15ACD9] hover:text-white group {{ $isActive ? 'bg-[#15ACD9] text-white' : ''}}">{{$label}}</a></li>