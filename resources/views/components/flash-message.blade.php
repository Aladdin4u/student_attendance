@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="fixed top-10 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-3 py-2 z-50 rounded-lg">
    <p>{{session('message')}}</p>
</div>
@endif
@if(session()->has('email'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="fixed top-10 left-1/2 transform -translate-x-1/2 bg-red-600 text-white px-3 py-2 z-50 rounded-lg">
    <p>{{session('status')}}</p>
</div>
@endif