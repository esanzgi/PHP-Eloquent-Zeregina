@include('includes.header')


<div>
  <h1>Erabiltzailea Gehitu</h1>

  <form action="{{ route('addUser') }}" method="post">
    @csrf

    <label for="izena">Izena:</label>
    <input type="text" name="izena" value="{{ old('izena') }}" >
    <br>
    @error('izena')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="adina">Adina:</label>
    <input type="number" name="adina" value="{{ old('adina') }}" >
    <br>
    @error('adina')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ old('email') }}">
    <br>
    @error('email')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="jaiotze_data">Jaiotze data:</label>
    <input type="date" name="jaiotze_data" value="{{ old('jaiotze_data') }}">
    <br>
    @error('jaiotze_data')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="generoa">Generoa:</label>
    <select name="generoa" >
        <option value="">Aukeratu</option>
        <option value="maskulinoa" {{ old('generoa') == 'maskulinoa' ? 'selected' : '' }}>Maskulinoa</option>
        <option value="femeninoa" {{ old('generoa') == 'femeninoa' ? 'selected' : '' }}>Femeninoa</option>
    </select>
    <br>
    @error('generoa')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <button type="submit">Gehitu</button>
</form>

</div>

<br><br>


<div>
  <h1>Erabiltzaile zerrenda</h1>

  <ul>
      @foreach($users as $user)
          <li>
            <strong>ID: </strong> {{ $user->id }} -->
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
            <br>
            <strong>Adina: </strong> 
            {{ $user->adina }}
            <br>
            <strong>email: </strong> 
            {{ $user->email }}
            <br>
            <strong>Jaiotze data: </strong> 
            {{ $user->jaiotze_data }}
            <br>
            <strong>Generoa: </strong>
            {{ $user->generoa}}

            
          </li>
          <br>
      @endforeach
  </ul>
</div>
