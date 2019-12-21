@auth
<h4>Voce esta logado</h4>
<p> {{ Auth::user()->name }} </p>
<p> {{ Auth::user()->email }} </p>
<p> {{ Auth::user()->id }}</p>
@endauth

@guest
<h4>Voce nao esta logado</h4>
@endguest
