<h1>attendances</h1>
@unless(count($attendances) == 0)
<table>
  <tr>
    <th>#</th>
    <th>first Name</th>
    <th>course code</th>
    <th>course Title</th>
    <th>Level</th>
    <th>Staus</th>
    <th>Date</th>
  </tr>
  @foreach($attendances as $attendance)
  <tr>
    <td>{{$attendance['id']}}</td>
    <td>{{$attendance['firstName']}}</td>
    <td>{{$attendance['code']}}</td>
    <td>{{$attendance['title']}}</td>
    <td>{{$attendance['level']}}</td>
    <td>{{$attendance['is_present']}}</td>
    <td>{{$attendance['date']}}</td>
    <td><a href="/attendances/{{$attendance['id']}}">view</a></td>
    <td>
      <form method="POST" action="/attendances/{{$attendance->id}}">
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
<p>No attendance availabe</p>
@endunless
