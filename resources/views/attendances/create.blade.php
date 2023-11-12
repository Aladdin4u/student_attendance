<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">Take attendance for ({{date('Y-m-d')}})</h1>
  <div class="card-body bg-white p-3 space-y-4 shadow-md rounded-lg space-y-4">
    <h2 class="font-semibold text-left">
      All Students
    </h2>
    {{ $dataTable->table() }}
  </div>

  <button class="btn btn-primary" id="save-btn">save</button>

  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush

</x-layout>
<script>
  $(document).ready(function() {
    const formData = [];
    $('#save-btn').on('click', function() {
      $('#form > input[type="checkbox"]').each(function(index, value) {
        let data = ["is_present:" + (this.checked ? "present" : "absent"), "student_id:" + value.value, "course_id:" + $("#course_id").val(), "date:" + $("#date").val()]
        formData.push(data)
        // console.log(["is_present:" + (this.checked ? "present" : "absent"), "student_id:" + value.value, "course_id:" + $("#course_id").val(), "date:" + $("#date").val()])
      });
      console.log(formData);
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: "POST",
        url: "/attendances",
        data: formData,
        dataType: "json",
        success: function(data) {
          console.log(data);
        },
      });
      console.log(formData);
    });
  })
</script>