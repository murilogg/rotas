<h1>terceira view</h1> <br><br>


<h2>Minha view hello .blade rota diferente</h2>

<h2>recebe nome = {{$nome}} {{$sobre}}</h2>


<pre>route::view ('/viewnome','helloTres',
    ['nome'=>'Murilo','sobre'=>'Gomes']);

    <!-- ROTAS-->

    route::get('/nome/{nome}/{sobre}',function ($nome,$sobre){
    return view('helloTres',['nome'=>$nome,'sobre'=>$sobre]);
});</pre>
