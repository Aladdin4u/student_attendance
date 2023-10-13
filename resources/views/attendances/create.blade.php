<h1>Create attendance</h1>
<h2>attendances</h2>
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
  <tr>
    <td>{{$attendance['id']}}</td>
    <td>{{$attendance['firstName']}}</td>
    <td>{{$attendance['lastName']}}</td>
    <td>{{$attendance['otherName']}}</td>
    <td>{{$attendance['regNumber']}}</td>
    <td>{{$attendance['code']}}</td>
    <td>{{$attendance['level']}}</td>
    <td>
      <form method="POST" action="/hattendances/{{$attendance->id}}">
          @csrf
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
<p>No attendance availabe</p>
@endunless