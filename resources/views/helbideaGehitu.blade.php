@include('includes.header')

<div>
  <h1>Erabiltzaileak eta Helbideak</h1>

  @if($usuariosConDirecciones->isEmpty())
        <p>Ez dago erabiltzailerik sortuta. Helbideak gehitzeko erabiltzaileak sortu</p>
  @endif

  <ul>
    @foreach($usuariosConDirecciones as $usuario)
        <li>
            <strong>Erabiltzailea:</strong> {{ $usuario->izena }}

            <form action="{{ route('addDireccion', ['id'=>$usuario->id])}}" method="post" style="display: inline;">
              @csrf
              <input type="text" name="helbidea" placeholder="helbidea" required>
              <button type="submit">Gehitu</button>
            </form>

            <form action="{{ route('deleteDireccion', ['id'=>$usuario->id]) }}" method="post" style="display: inline;">
              @csrf
              @method('delete')
              <button type="submit">Ezabatu</button>
            </form>

            @if($usuario->direcciones)
                <br>
                <strong>Helbidea:</strong> {{ $usuario->direcciones->helbidea }}
            @else
                <br>
                <em style="color: red;">Helbiderik gabe</em>
            @endif

            <br><br>
        </li>
    @endforeach
</ul>
</div>