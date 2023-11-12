<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">Take attendance for ({{date('Y-m-d')}})</h1>
  <div class="card-body bg-white p-3 space-y-4 shadow-md rounded-lg space-y-4">
    <h2 class="font-semibold text-left">
      All Students
    </h2>
    {{ $dataTable->table() }}
  </div>

  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush
</x-layout>