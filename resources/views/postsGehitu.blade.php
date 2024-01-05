@include('includes.header')

<h1>Erabiltzaileak eta Post-ak</h1>

@foreach($usersWithPosts as $user)
    <div style="margin-bottom: 20px;">
        User: {{ $user->izena }}
        <form action="{{ route('createPostView', ['userId' => $user->id]) }}" method="get" style="display: inline;"> 
          <button type="submit">Post-a sortu</button>
        </form>
        <ul>
        <strong>Post-ak:</strong> 
          @forelse($user->posts as $post)
              <li>
                  {{ $post->edukia }}
                  <form action="{{ route('updatePostView', ['id' => $post->id]) }}" method="get" style="display: inline;">
                      @csrf
                      <button type="submit">Eguneratu</button>
                  </form>
                  <form action="{{ route('deletePost', ['id' => $post->id]) }}" method="post" style="display: inline;">
                      @csrf
                      @method('delete')
                      <button type="submit">Delete</button>
                  </form>
              </li>
          @empty
              <li style="color: red;">Ez ditu post-ak oraindik</li>
          @endforelse
        </ul>
        
    </div>
    <hr>
@endforeach