<h1>single lession</h1>
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
    <td>{{$lession['id']}}</td>
    <td>{{$lession['firstName']}}</td>
    <td class="text-red-600">{{$lession['lastName']}}</td>
    <td>{{$lession['otherName']}}</td>
    <td>{{$lession['regNumber']}}</td>
    <td>{{$lession['level']}}</td>
  </tr>
</table>