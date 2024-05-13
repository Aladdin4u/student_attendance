<x-layout>
  <h1 class="text-lg font-semibold">View Class Attendance</h1>
  <div class="w-full flex flex-col p-5 my-4 rounded-lg text-gray-900 bg-white space-y-2 dark:text-white dark:bg-gray-800">
    <h2 class="font-bold">
      View Class Attendance
    </h2>
  </div>

  <div class="bg-white space-y-4 px-4 py-3 shadow-md rounded-lg">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-left">
        Class Attendance
      </h2>
    </div>
    {{ $dataTable->table() }}
  </div>

  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush
</x-layout>
<!-- <script>
  var id = "{{auth()->user()->id}}";

  $(document).ready(function() {
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
  });
  
  $(document).ready(function() {

    var start_date = moment().subtract(1, 'M');

    var end_date = moment();

    $('#daterange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format('MMMM D, YYYY'));
    $('.applyBtn').css('bg-blue');
    $('#daterange').daterangepicker({
      startDate: start_date,
      endDate: end_date,
      applyButtonClasses: "rounded-sm text-white bg-sky-400 hover:bg-sky-500"
    }, function(start_date, end_date) {
      $('#daterange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format('MMMM D, YYYY'));

      let d = "?from_date=" + start_date.format('YYYY-MM-DD') + "&" + "to_date=" + end_date.format('YYYY-MM-DD');
      window.location.href = d;
    });

  });
</script> -->