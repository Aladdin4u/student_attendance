<x-layout>
    <div id="message"></div>
    <h1 class="text-lg font-semibold text-left mb-4">Register Course</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="font-semibold text-left">Register courses for this semester</h2>

        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th>Course Title</th>
                    <th>Course Code</th>
                    <th>Course Unit</th>
                    <th><input type="checkbox" id="check-all"></th>
                </tr>
            </thead>
            <tbody>
                @unless($courses->isEmpty())
                @foreach($courses as $course)
                <tr class="border-gray-300">
                    <td class="p-2 border-t border-b border-gray-300 text-lg">
                        {{$course->title}}
                    </td>
                    <td class="p-2 border-t border-b border-gray-300 text-lg">
                        {{$course->code}}
                    </td>
                    <td class="p-2 border-t border-b border-gray-300 text-lg">
                        {{$course->unit}}
                    </td>
                    <td class="p-2 border-t border-b border-gray-300 text-lg">
                        <div>
                            <input type="text" id="user" name="user_id" value="{{$user}}" hidden />
                            <input type="checkbox" name="course_id" class="course-checkbox" value="{{$course->id}}">
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="p-2 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No courses Found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>

        <div class="mx-auto flex flex-row items-center justify-between space-x-2">
            <button id="save-btn" class="flex w-60 justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
                Save
            </button>
            <a href="/users/{{$user}}" class="flex w-60 justify-center rounded-md bg-sky-400 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-sky-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400">
                Back
            </a>
        </div>
    </div>
</x-layout>
<script>
    $(document).ready(function() {
        const formData = [];
        const ifCheck = [];
        $('#check-all').on('click', function() {
            if (this.checked) {
                $('input[type="checkbox"]').each(function(index, value) {
                    $(this).prop('checked', true);
                });
            } else {
                $('input[type="checkbox"]').each(function(index, value) {
                    $(this).prop('checked', false);
                });
            }
        });

        $('#save-btn').on('click', function() {
            const user = $('input[type="text"]').val();
            console.log($('.course-checkbox').length);

            $('.course-checkbox').each(function(index, value) {
                let data = {
                    user_id: user,
                    course_id: value.value,
                    is_active: (this.checked ? 1 : 0),
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
                url: "/coursesoffer/student",
                data: {
                    formData: formData
                },
                success: function(data) {
                    $('#save-btn').attr("disabled", true)
                    $('#message').text("Courses form is registered successfully!");
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