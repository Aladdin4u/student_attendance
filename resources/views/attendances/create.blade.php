<h1>Create attendance</h1>
<h2>attendances</h2>
<p>Take attendance for {{date('Y-m-d')}}</p>
@unless(count($attendances) == 0)
<table>
  <tr>
    <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Other Name</th>
    <th>Reg Number</th>
    <th>Course Code</th>
    <th>level</th>
    <th>Check</th>
  </tr>
@foreach($attendances as $attendance)
  <form method="POST" action="/attendances">
    @csrf
    <tr>
      <td><input type="text" name="course_id" value="{{$attendance['course_id']}}" style="display: none;">{{$attendance['title']}}</td>
      <td><input type="text" name="student_id" value="{{$attendance['student_id']}}" style="display: none;"> {{$attendance['firstName']}}</td>
      <td>{{$attendance['lastName']}}</td>
      <td>{{$attendance['otherName']}}</td>
      <td>{{$attendance['regNumber']}}</td>
      <td>{{$attendance['code']}}</td>
      <td>{{$attendance['level']}}</td>
      <td>
      <input type="text" name="date" value="{{date('Y-m-d')}}" style="display: none;">
      <select name="is_present" id="is_present" class="border border-gray-200 rounded p-2 w-full">
          <option value="present">Present</option>
          <option value="absent" selected>Absent</option>
        </select>
      </td>
      <td><button type="submit" >Mark attendance</button></td>
      <td>{{$attendance['id']}}</td>
    </tr>
  </form>
@endforeach
</table>
@else 
<p>No attendance availabe</p>
@endunless