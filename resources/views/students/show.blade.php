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
