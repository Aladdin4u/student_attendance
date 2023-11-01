<x-layout>
  <h1>manage users</h1>
  <form action="/users/manage/">
    <input type="text" name="search" placeholder="search user">
    <button type="submit">Search</button>
  </form>
  <p><a href="/users/create">Create new user</a></p>
  <h2>users</h2>
  @unless(count($users) == 0)
  <table>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone Number</th>
    </tr>
    @foreach($users as $user)
    <tr>
      <td>{{$user['id']}}</td>
      <td>{{$user['firstName']}}</td>
      <td>{{$user['lastName']}}</td>
      <td>{{$user['email']}}</td>
      <td>{{$user['phoneNumber']}}</td>
      <td><a href="/users/{{$user['id']}}">view</a></td>
      <td><a href="/users/{{$user['id']}}/edit">edit</a></td>
      <td>
        <form method="POST" action="/users/{{$user['id']}}">
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
  <p>No user availabe</p>
  @endunless
</x-layout>