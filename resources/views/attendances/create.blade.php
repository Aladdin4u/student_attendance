<x-layout>
  <h1 class="text-lg font-semibold text-left mb-4">Take attendance for ({{date('Y-m-d')}})</h1>
  <div x-data="{
            pathname: location.pathname,
            dd: {{ request()->is('attendances/create')}}
  }" @hashchange.window="page = location.hash">
    <h3>Read Query Parameter Demo</h3>
    <p class="mb-2">
      location.search: "<span x-text="location.search"></span>"
    </p>
    <p>
      Pathname: "<span x-text="pathname"></span>"
      dd: <span x-text="dd"></span>
    </p>
  </div>

  <div x-data="{
    open: false,
    toggle(){
                this.open = this.open ? false : true
    }}" x-init=" {{ request()->is('attendances/create')}} ? open = true : open = false ">
    <button x-on:click="toggle()" class="border">click</button>
    <p x-show="open">text go here!</p>
  </div>
  <div class="card-body bg-white p-3 space-y-4 shadow-md rounded-lg space-y-4">
    <h2 class="font-semibold text-left">
      All Students
    </h2>
    {{ $dataTable->table() }}
    <button type="submit" id="save-btn" class="flex justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">Take Attendance</button>
  </div>


  @push('scripts')
  {{ $dataTable->scripts() }}
  @endpush

</x-layout>
<script>
  $(document).ready(function() {
    const formData = [];
    $('#save-btn').on('click', function() {
      $('#form > input[type="checkbox"]').each(function(index, value) {
        let data = {
          is_present: (this.checked ? "present" : "absent"),
          student_id: value.value,
          course_id: $("#course_id").val(),
          date: $("#date").val()
        }
        formData.push(data)
        // console.log(["is_present:" + (this.checked ? "present" : "absent"), "student_id:" + value.value, "course_id:" + $("#course_id").val(), "date:" + $("#date").val()])
      });
      let d = formData.map(data => {
        return {
          is_present: data.is_present,
          student_id: data.student_id,
          course_id: data.course_id,
          date: data.date
        }
      })
      console.log(JSON.stringify(formData));
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
          console.log(data);
          window.location.href = "/attendances";
        },
      });
      console.log(formData);
    });
  })
</script>