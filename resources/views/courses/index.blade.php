<x-layout>
  <h1>courses</h1>
  @unless(count($courses) == 0)
  <table>
    <tr>
      <th>#</th>
      <th>Code</th>
      <th>Title</th>
      <th>Semester</th>
      <th>Session</th>
    </tr>
    @foreach($courses as $course)
    <tr>
      <td>{{$course['id']}}</td>
      <td>{{$course['code']}}</td>
      <td>{{$course['title']}}</td>
      <td><a href="/courses/{{$course['id']}}">view</a></td>
      <td>
        <form method="POST" action="/courses/{{$course->id}}">
          @csrf
          @method('DELETE')
          <button class="text-red-600">
            <i class="fa-solid fa-trash-can"></i>
            Delete
          </button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  @else
  <p>No course availabe</p>
  @endunless
</x-layout>