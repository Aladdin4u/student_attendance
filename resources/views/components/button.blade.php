<button {{ $attributes->merge(['class' => 'flex justify-center rounded-md bg-[#15ACD9] px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-[#43bce0] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400']) }}>
    {{$slot}}
</button>