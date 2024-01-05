@include('includes.header')

<h1>Tema gehitu</h1>

<form action="{{ route('createTema') }}" method="post">
  @csrf
  <label>Tema: </label>
  <input type="text" name="izena">
  <button type="submit">Gehitu</button>
</form>

<h1>Tema zerrenda</h1>

<ul>
  @forelse($temas as $tema)
  <li>
    {{ $tema->tema_izena }}

    <form action="{{ route('ezabatu', ['id'=>$tema->id]) }}" method="post" style="display: inline;">
      @csrf
      @method('delete')
      <button type="submit">Ezabatu</button>
    </form>
  </li>
  <br>
  @empty
  <li style="color: red;">Ez dago temarik oraindik</li>
  @endforelse
</ul>