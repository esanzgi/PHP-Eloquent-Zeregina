@include('includes.header')

<h2>{{ $post->usuarios->izena }} -> Post-a eguneratu</h2>

<form action="{{ route('updatePost', ['id'=>$post->id]) }}" method="post">
  @csrf
  @method('put')
  <label >Post-a</label>
  <textarea name="edukia" cols="30" rows="10">{{ $post->edukia }}</textarea>

  <br><br>
  <label >Temas:</label>
    @forelse ($temas as $tema)
        <br>
        <label>
            <input 
              type="checkbox" 
              name="tema[]" 
              value="{{ $tema->id }}" 
              {{ $post->temas->contains($tema->id) ? 'checked' : '' }}
              >
            {{ $tema->tema_izena }}
        </label>
    @empty
      <em style="color: red;">Ez dago temarik aukeratzeko</em>
    @endforelse
  <br><br>
  <button type="submit">Eguneratu</button>
</form>
