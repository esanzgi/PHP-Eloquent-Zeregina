@include('includes.header')

<h2>{{ $post->usuarios->izena }} -> Post-a eguneratu</h2>

<form action="{{ route('updatePost', ['id'=>$post->id]) }}" method="post">
  @csrf
  @method('put')
  <label >Post-a</label>
  <textarea name="edukia" cols="30" rows="10">{{ $post->edukia }}</textarea>
  <button type="submit">Eguneratu</button>
</form>
