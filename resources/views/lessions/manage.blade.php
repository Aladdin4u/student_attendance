<h1>manage lessions</h1>
<form action="/lessions/manage/">
  <input type="text" name="search" placeholder="search lession">
  <button type="submit">Search</button>
</form>
<p><a href="/lessions/create">Create new lession</a></p>
<h2>lessions</h2>
@unless(count($lessions) == 0)
<table>
  <tr>
  <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Other Name</th>
    <th>Reg Number</th>
    <th>course code</th>
    <th>level</th>
    <th>Status</th>
    <th>date</th>
  </tr>
  @foreach($lessions as $lession)
  <tr>
    <td>{{$lession['id']}}</td>
    <td>{{$lession['firstName']}}</td>
    <td>{{$lession['lastName']}}</td>
    <td>{{$lession['otherName']}}</td>
    <td>{{$lession['regNumber']}}</td>
    <td>{{$lession['code']}}</td>
    <td>{{$lession['level']}}</td>
    <td>{{ $lession['is_present'] == 1 ? "Present" : "Absent" }}</td>
    <td>{{$lession['date']}}</td>
    <td><a href="/lessions/{{$lession['id']}}">view</a></td>
    <td><a href="/lessions/{{$lession['id']}}/edit">edit</a></td>
    <td>
      <form method="POST" action="/lessions/{{$lession['id']}}">
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
<p>No lession availabe</p>
@endunless