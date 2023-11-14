<x-layout>
  <h1 class="text-lg font-semibold">Overall Students Attendance</h1>

  <div class="card-body mt-4 bg-white p-3 space-y-4 shadow-md rounded-lg space-y-4">
    <h2 class="font-semibold text-left">
      Overall Attendance
    </h2>
    {{ $dataTable->table() }}
  </div>

  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush
</x-layout>