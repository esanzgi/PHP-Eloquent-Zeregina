@include('includes.header')

<div>
  <h1>Erabiltzailea Eguneratu</h1>

  <form action="{{ route('editUser', ['id' => $user->id])}}" method="post">
    @csrf
    @method('put')
    <label for="">Izena: </label>
    <input type="text" name="izena" placeholder="Izen berria" required>
    <button type="submit">Eguneratu</button>
  </form>
</div>