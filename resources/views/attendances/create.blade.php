@php
$date = date('Y-m-d');
$now = date('Y-m-d H:i:s');
@endphp
<x-layout>
  <div id="message"></div>
  <h1 class="text-lg font-semibold text-left mb-4">Take attendance for ({{$date}})</h1>
  <div class="card-body bg-white p-3 space-y-4 shadow-md rounded-lg space-y-4">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-left">
        All Students
      </h2>

      <div class="relative inline-block group">

        <button id="dropdownHoverButton" class="bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-200" type="button">Courses <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
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
    <div>
    <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Select Date</label>
      <input type="date" name="date" id="date" value="{{$date}}" class="rounded-md border-0 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6">
    </div>
    {{ $dataTable->table() }}
    <button type="submit" id="save-btn" class="flex justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">Take Attendance</button>
  </div>


  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush

</x-layout>
<script>
  const now = "{{$now}}";
  var id = "{{auth()->user()->id}}";

  $.ajax({
    url: "/api/course/" + id,
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
  $(document).ready(function() {
    const formData = [];
    $('#save-btn').on('click', function() {
      $('#form > input[type="checkbox"]').each(function(index, value) {
        let data = {
          status: (this.checked ? "present" : "absent"),
          user_id: value.value,
          course_id: $("#course_id").val(),
          date: $("#date").val(),
          created_at: now,
          updated_at: now
        }
        formData.push(data)
      });
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: "POST",
        url: "/attendances",
        data: {
          formData: formData
        },
        success: function(data) {
          $('#message').text("Attendance checked!");
          $('#message').addClass("fixed top-10 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-48 py-3 z-50 rounded-lg");
          setTimeout(function() {
            $('#message').slideUp();
          }, 5000);

          window.location.href = "/attendances";
        },
      });
    });
  })

  function handleAttendance(user_id) {
    console.log("attendace submitted", user_id);
  }
</script>