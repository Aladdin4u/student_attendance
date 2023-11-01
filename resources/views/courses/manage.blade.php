<x-layout>
  <h1>manage courses</h1>
  <form action="/courses/manage/">
    <input type="text" name="search" placeholder="search course">
    <button type="submit">Search</button>
  </form>
  <p><a href="/courses/create">Create new course</a></p>
  <h2>courses</h2>
  @unless(count($courses) == 0)
  <table>
    <tr>
      <th>#</th>
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
      <td>{{$course['semester']}}</td>
      <td>{{$course['session']}}</td>
      <td><a href="/courses/{{$course['id']}}">view</a></td>
      <td><a href="/courses/{{$course['id']}}/edit">edit</a></td>
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