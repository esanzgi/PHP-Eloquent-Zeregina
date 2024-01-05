@include('includes.header')

<h2>{{ $user->izena }} -> Post-a sortu</h2>

<form action="{{ route('createPost', ['userId'=>$user->id]) }}" method="post">
  @csrf
  <label >Post-a</label>
  <textarea name="edukia" cols="30" rows="10"></textarea>
  <br><br>
  <label >Temas:</label>
    @forelse ($temas as $tema)
        <br>
        <label>
            <input type="checkbox" name="tema[]" value="{{ $tema->id }}">
            {{ $tema->tema_izena }}
        </label>
    @empty
      <em style="color: red;">Ez dago temarik aukeratzeko</em>
    @endforelse
  <br><br>
  <button type="submit">Sortu</button>
</form>

