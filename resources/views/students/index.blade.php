<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">All Students</h1>
  <div class="bg-white p-3 space-y-4 shadow-md rounded-lg space-y-4">
    <h2 class="font-semibold text-left">
      All Students
    </h2>
    {{ $dataTable->table() }}
  </div>

  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush

</x-layout>