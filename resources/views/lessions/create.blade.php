<x-layout>
    <h2>Create lession</h2>
    <form method="POST" action="/lessions">
        @csrf
        <div class="mb-6">
            <label for="student_id" class="inline-block text-lg mb-2">Student</label>
            <select name="student_id" id="student_id" class="border border-gray-200 rounded p-2 w-full">
                <option value="">-- Select Student --</option>
                @foreach($students as $student)
                <option value="{{$student->id}}">{{$student->regNumber}}</option>
                @endforeach
            </select>
            @error('student_id')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="course_id" class="inline-block text-lg mb-2">Course</label>
            <select name="course_id" id="course_id" class="border border-gray-200 rounded p-2 w-full">
                <option value="">-- Select Course --</option>
                @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->code}}</option>
                @endforeach
            </select>
            @error('course_id')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="lecturer_id" class="inline-block text-lg mb-2">lecturer</label>
            <select name="lecturer_id" id="lecturer_id" class="border border-gray-200 rounded p-2 w-full">
                <option value="">-- Select lecturer --</option>
                @foreach($lecturers as $lecturer)
                <option value="{{$lecturer->id}}">{{$lecturer->firstName}}</option>
                @endforeach
            </select>
            @error('lecturer_id')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Save
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
</x-layout>