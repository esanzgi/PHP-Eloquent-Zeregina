@include('includes.header')

<h2>{{ $user->izena }} -> Post-a sortu</h2>

<form action="{{ route('createPost', ['userId'=>$user->id]) }}" method="post">
  @csrf
  <label >Post-a</label>
  <textarea name="edukia" cols="30" rows="10"></textarea>
  <button type="submit">Sortu</button>
</form>
