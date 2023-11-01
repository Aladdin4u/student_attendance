<x-layout>
    <h1>Dashboard</h1>
    @unless(auth()->user() == null)
        <h2>welcome {{auth()->user()->firstName}}</h2>
        <form action="/logout" method="POST" >
            @csrf
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
               Logout
            </button>
        </form>
    @endunless
</x-layout>