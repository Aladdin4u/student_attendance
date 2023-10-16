<h1>single student</h1>
<table>
  <tr>
    <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Other Name</th>
    <th>Reg Number</th>
    <th>Level</th>
  </tr>
  <tr>
    <td>{{$student['id']}}</td>
    <td>{{$student['firstName']}}</td>
    <td class="text-red-600">{{$student['lastName']}}</td>
    <td>{{$student['otherName']}}</td>
    <td>{{$student['regNumber']}}</td>
    <td>{{$student['level']}}</td>
  </tr>
</table>

<h2>Course</h2>
@unless($courses->isEmpty())
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
    <td>{{$course['semester']}}</td>
    <td>{{$course['session']}}</td>
    <td><a href="/attendances/{{$course['attendance_id']}}">view Attendances</a></td>
  </tr>
  @endforeach
</table>
@else 
<p>No course availabe</p>
@endunless