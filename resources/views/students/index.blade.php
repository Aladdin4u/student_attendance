<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">All Students</h1>
  <div class="bg-white p-3 space-y-4 shadow-md rounded-lg space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-left">
      All Students
      </h2>

      <div class="relative inline-block group">

        <button id="dropdownHoverButton" class="bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-200" type="button">Courses <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
          </svg>
        </button>

        <!-- Dropdown menu -->
        <div class="z-10 absolute hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-36 dark:bg-gray-700 group-hover:block">
          <ul id="list" class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
          </ul>
        </div>

      </div>
    </div>
    {{ $dataTable->table() }}
  </div>

  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush

</x-layout>
<script>
  var id = "{{auth()->user()->id}}";
  $.ajax({
    url: "api/course/" + id,
    type: "GET",
    success: function(data) {
      $.each(data, function(index, value) {
        let listElement = $("<li></li>");
        listElement.attr('title', value.title)
        listElement.addClass("block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white");
        let link = $("<a></a>")
        link.append(value.code)
        link.attr('href', '?course_id=' + value.course_id);
        listElement.append(link)
        $('#list').append(listElement)
      })
    }
  });
</script>