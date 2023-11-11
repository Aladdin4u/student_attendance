<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">All Students</h1>
  <div class="card-body bg-white py-5 px-3 space-y-4 shadow-md rounded-lg">
    <h2 class="font-semibold text-left">
      All Students
    </h2>
    {{ $dataTable->table() }}
  </div>

  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush
</x-layout>