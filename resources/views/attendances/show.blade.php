<x-layout>
  <h1 class="text-lg font-semibold">View Class Attendance</h1>

  <div class="bg-white mt-4 p-3 space-y-4 shadow-md rounded-lg space-y-4">
    <h2 class="font-semibold text-left">
      Class Attendance
    </h2>
    {{ $dataTable->table() }}
  </div>

  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush

</x-layout>