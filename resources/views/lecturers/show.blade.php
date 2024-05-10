@php
$date = date('Y-m-d');
$now = date('Y-m-d H:i:s');
@endphp
<x-layout>
  <div id="message"></div>
  <h1 class="text-lg font-semibold text-left mb-4">Take class attendance for ({{$date}})</h1>
  <div class="card-body bg-white py-5 px-3 space-y-4 shadow-md rounded-lg">
    <h2 class="font-semibold text-left">
      Class Attendance
    </h2>
    {{ $dataTable->table() }}
    <button type="submit" id="save-btn" class="flex justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">Take Attendance</button>
  </div>

  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush
</x-layout>
<script>
  let section_id;
  const now = "{{$now}}";
  const date = "{{$date}}";

  $.ajax({
    url: "/api/sections",
    type: "GET",
    success: function(data) {
      section_id = data[0].id
    }
  });

  $(document).ready(function() {
    let course_id = window.location.pathname;
    course_id = course_id.split("/")[2];
    const formData = [];
    $('#save-btn').on('click', function() {
      $('input[type="checkbox"]').each(function(index, value) {
        let data = {
          status: (this.checked ? "present" : "absent"),
          user_id: parseInt(value.value),
          course_id: parseInt(course_id),
          section_id: section_id,
          date: date,
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
          $('#save-btn').attr("disabled", true)
          $('#message').text("Class attendance marked for today!");
          $('#message').addClass("fixed top-10 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-48 py-3 z-50 rounded-lg");
          setTimeout(function() {
            $('#message').slideUp();
          }, 5000);
        },
        error: function(data) {
          $('#save-btn').attr("disabled", true)
          $('#message').text(data.responseJSON.message);
          $('#message').addClass("fixed top-10 left-1/2 transform -translate-x-1/2 bg-red-600 text-white px-48 py-3 z-50 rounded-lg");
          setTimeout(function() {
            $('#message').slideUp();
          }, 5000);

        }
      });
    });
  });
</script>