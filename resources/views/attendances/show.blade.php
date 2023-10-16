<h1>single Attendance</h1>
<table>
  <tr>
    <th>status</th>
    <th>date</th>
  </tr>
  <tr>
  <tr>
    <td>{{$attendance['is_present'] == 1 ? "Present" : "Absent"}}</td>
    <td>{{$attendance['date']}}</td>
  </tr>
</table>