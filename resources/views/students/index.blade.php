<h1>Students</h1>
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
    <td>{{$student['othersName']}}</td>
    <td>{{$student['regNumber']}}</td>
    <td>{{$student['level']}}</td>
    <td><a href="/students/{{$student['id']}}">view</a></td>
  </tr>
  @endforeach
</table>
@else 
<p>No student availabe</p>
@endunless
