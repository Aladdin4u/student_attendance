<x-layout>
  <h1>lessions</h1>
  @unless(count($lessions) == 0)
  <table>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Code</th>
      <th>Title</th>
    </tr>
    @foreach($lessions as $lession)
    <tr>
      <td>{{$lession['id']}}</td>
      <td>{{$lession['firstName']}}</td>
      <td>{{$lession['lastName']}}</td>
      <td>{{$lession['code']}}</td>
      <td>{{$lession['title']}}</td>
      <td><a href="/lessions/{{$lession['id']}}">view</a></td>
      <td>
        <form method="POST" action="/lessions/{{$lession->id}}">
          @csrf
          @method('DELETE')
          <button class="text-red-600">
            <i class="fa-solid fa-trash-can"></i>
            Delete id= {{$lession->id}}
          </button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
  @else
  <p>No lession availabe</p>
  @endunless
</x-layout>