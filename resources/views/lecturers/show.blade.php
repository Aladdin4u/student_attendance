@php
$date = date('Y-m-d');
$now = date('Y-m-d H:i:s');
@endphp
<x-layout>
  <div id="message" class="fixed top-10 left-1/2 transform -translate-x-1/2 text-white px-3 py-2 z-50 rounded-lg hidden"></div>
  <h1 class="text-lg font-semibold text-left mb-4">Take class attendance for (<span id="onDateChange"></span>)</h1>
  <div class="card-body bg-white py-5 px-3 space-y-4 shadow-md rounded-lg">
    <h2 class="font-semibold text-left">
      Class Attendance
    </h2>
    <div class="w-60 space-y-2">
      <x-label for="attendance-date">Select Date</x-label>
      <x-input type="date" id="attendance-date" name="attendance-date" value="{{$date}}" />
    </div>
    {{ $dataTable->table() }}
    <x-row>
      <x-button type="submit" id="save-btn" class="w-60">Take Attendance</x-button>
      <x-link href="{{url()->previous()}}" class="w-60">Back</x-link>
    </x-row>
  </div>

  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush
</x-layout>
<script>
  let section_id;
  const now = "{{$now}}";
  let date = "{{$date}}";
  $('#onDateChange').text(date);

  $('#attendance-date').change(function() {
    let dateChange = $(this).val();
    $('#onDateChange').text(dateChange);
    date = dateChange;
  });

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
    let formData = [];
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
          formData = [];
          $('#message').text("Class attendance marked for today!");
          $('#message').addClass("bg-green-600");
          $('#message').removeClass("hidden");
          setTimeout(function() {
            $('#message').addClass("hidden");
            $('#message').removeClass("bg-green-600");
          }, 5000);
        },
        error: function(data) {
          formData = [];
          $('#message').text(data.responseJSON.message);
          $('#message').addClass("bg-red-600");
          $('#message').removeClass("hidden");
          setTimeout(function() {
            $('#message').addClass("hidden");
            $('#message').removeClass("bg-red-600");
          }, 5000);

        }
      });
    });
  });
</script>