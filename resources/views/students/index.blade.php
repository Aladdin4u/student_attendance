<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">All Students</h1>

  <div x-data="{
            pathname: location.pathname,
            dd: 'heloo world'
  }" @hashchange.window="page = location.hash">
    <h3>Read Query Parameter Demo</h3>
    <p class="mb-2">
      location.search: "<span x-text="location.search"></span>"
    </p>
    <p>
      Pathname: "<span x-text="pathname"></span>"
      dd: "<span x-text="dd"></span>"
    </p>
  </div>
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