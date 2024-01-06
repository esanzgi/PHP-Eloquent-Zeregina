@include('includes.header')

<div>
  <h1>Erabiltzailea Eguneratu</h1>

  <form action="{{ route('editUser', ['id' => $user->id])}}" method="post">
    @csrf
    @method('put')
    <label for="izena">Izena:</label>
    <input type="text" name="izena" value="{{ old('izena') ?? $user->izena }}" >
    <br>
    @error('izena')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="adina">Adina:</label>
    <input type="number" name="adina" value="{{ old('adina') ?? $user->adina }}" >
    <br>
    @error('adina')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ old('email') ?? $user->email }}">
    <br>
    @error('email')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="jaiotze_data">Jaiotze data:</label>
    <input type="date" name="jaiotze_data" value="{{ old('jaiotze_data') ?? $user->jaiotze_data }}">
    <br>
    @error('jaiotze_data')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="generoa">Generoa:</label>
    <select name="generoa">
        <option value="">Aukeratu</option>
        <option value="maskulinoa" {{ (old('generoa') ?? $user->generoa) == 'maskulinoa' ? 'selected' : '' }}>Maskulinoa</option>
        <option value="femeninoa" {{ (old('generoa') ?? $user->generoa) == 'femeninoa' ? 'selected' : '' }}>Femeninoa</option>
    </select>
    <br>
    @error('generoa')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    <button type="submit">Eguneratu</button>
  </form>
</div>
