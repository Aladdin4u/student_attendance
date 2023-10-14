<h1>manage students</h1>
<form action="/students/manage/">
  <input type="text" name="search" placeholder="search student">
  <button type="submit">Search</button>
</form>
<p><a href="/students/create">Create new Student</a></p>
<h2>students</h2>
@unless(count($students) == 0)
<table>
  <tr>
  <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Other Name</th>
    <th>Reg Number</th>
    <th>Level</th>
  </tr>
  @foreach($students as $student)
  <tr>
    <td>{{$student['id']}}</td>
    <td>{{$student['firstName']}}</td>
    <td>{{$student['lastName']}}</td>
    <td>{{$student['otherName']}}</td>
    <td>{{$student['regNumber']}}</td>
    <td>{{$student['level']}}</td>
    <td><a href="/students/{{$student['id']}}">view</a></td>
    <td><a href="/students/{{$student['id']}}/edit">edit</a></td>
    <td>
      <form method="POST" action="/students/{{$student['id']}}">
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
<p>No student availabe</p>
@endunless