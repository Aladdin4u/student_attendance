<x-layout>
    <div id="message" class="fixed top-10 left-1/2 transform -translate-x-1/2 text-white px-3 py-2 z-50 rounded-lg bg-green-600">{{$message}}</div>
    <h1 class="text-lg font-semibold text-left mb-4">Edit Course</h1>
    <div class="w-full p-5 text-gray-900 bg-white dark:text-white dark:bg-gray-800 rounded-xl pb-12 space-y-2">
        <h2 class="mb-4 font-semibold text-left">Courses details</h2>

        <table class="w-full table-auto rounded-sm">
            <thead class="bg-[#15ACD9] text-white">
                <tr>
                    <th class="p-2 rounded-tl-lg">Course Title</th>
                    <th class="p-2">Course Code</th>
                    <th class="p-2">Course Unit</th>
                    <th class="p-2 rounded-tr-lg"><input type="checkbox" id="check-all"></th>
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
                            <input type="checkbox" name="course_id" {{$course->is_active == 1 ? 'checked': ''}} class="course-checkbox" value="{{$course->id}}-{{$course->cid}}">
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td colspan="4" class="p-2 border-gray-300 text-lg">
                        <p class="text-center">No courses Found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>

        <x-row>
            <x-button id="save-btn" class="w-60">
                Save
            </x-button>
            <x-link href="/users/{{$user}}" class="w-60">
                Back
            </x-link>
        </x-row>
    </div>
</x-layout>
<script>
    setTimeout(function() {
        $('#message').addClass("hidden");
        $('#message').removeClass("bg-green-600");
    }, 5000);
    $(document).ready(function() {
        let formData = [];
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

            $('.course-checkbox').each(function(index, value) {
                let splitStr = value.value.split('-')
                let courseId = splitStr[0]
                let courseOffer = splitStr[1]
                let data = {
                    id: courseOffer,
                    user_id: user,
                    course_id: courseId,
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
                type: "PUT",
                url: "/coursesoffer/student/edit",
                data: {
                    formData: formData
                },
                success: function(data) {
                    formData = [];
                    $('#message').text("Courses form updated successfully!");
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