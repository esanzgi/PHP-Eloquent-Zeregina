<div>
  <h1>Erabiltzailea Gehitu</h1>

  <form action="{{ route('addUser') }}" method="post">
    @csrf
    <label for="">Izena: </label>
    <input type="text" name="izena" required>
    <button type="submit">Gehitu</button>
  </form>
</div>

<br><br>


<div>
  <h1>Erabiltzaile zerrenda</h1>

  <ul>
      @foreach($users as $user)
          <li>
            {{ $user->izena }}

            <form action="{{ route('editView', ['id' => $user->id]) }}" method="get" style="display: inline;">
              @csrf
              <button type="submit">Eguneratu</button>
            </form>

            <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="post" style="display: inline;">
              @csrf
              @method('delete')
              <button type="submit">Ezabatu</button>
            </form>
          </li>
          <br>
      @endforeach
  </ul>
</div>