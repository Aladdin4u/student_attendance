<x-layout>
  <h1>single lessionStudent</h1>
  <table>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Code</th>
      <th>Title</th>
    </tr>
    <tr>
    <tr>
      <td>{{$lessionStudent['firstName']}}</td>
      <td>{{$lessionStudent['lastName']}}</td>
      <td>{{$lessionCourse['code']}}</td>
      <td>{{$lessionCourse['title']}}</td>
      <td><a href="/attendances/{{$lessionAttendance['attendance_id']}}">view Attendance</a></td>
    </tr>
  </table>
</x-layout>