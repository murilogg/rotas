<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    return "<h3>SEJA BEM VINDO</h3><br>";
});

Route::get('/irineu/{nome}', function ($nome) {
    return "o seu nome é <b>$nome</b> !";
});

Route::get('/repetir/{nome}/{num}', function ($nome, $num) {
    for ($i = 0; $i < $num; $i++) {
        echo "o seu nome é <b>$nome</b> !<br><br>";
    }
});

Route::get('/seuNomeComRegra/{nome}/{num}', function ($nome, $num) {
    for ($i = 0; $i < $num; $i++) {
        echo "o seu nome é <b>$nome</b> !  ($i)<br><br>";
    }
})->where('num', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/seuNomeSemRegra/{nome?}', function ($nome = null) {
    if (isset($nome)) {
        echo "o seu nome é <b>$nome</b> !<br><br>";
    } else {
        echo "<b>você não passou o nome !! <b>";
    }
});

route::prefix('grupo')->group(function () {
    route::get("/", function () {
        return "pagina principal";
    });
    route::get("paginaDois", function () {
        return "segunda";
    });
    route::get("paginatree", function () {
        return "terceira";
    });
});

route::redirect('/aqui', '/ola', 301);

Route::get('/hello', function () {
    return view('hello');
});

route::view('/hello2', 'helloDois');

route::view('/viewnome', 'helloTres',
    ['nome' => 'Murilo', 'sobre' => 'Gomes']);

route::get('/nome/{nome}/{sobre}', function ($nome, $sobre) {
    return view('helloTres',
        ['nome' => $nome, 'sobre' => $sobre]);
});

route::get('/metodos/http', function () {
    return "hello word da rota(GET)";
});

route::post('/metodos/http', function () {
    return "hello word da rota(POST)";
});

route::delete('/metodos/http', function () {
    return "hello word da rota(DELETE)";
});

route::put('/metodos/http', function () {
    return "hello word da rota(PUT)";
});

route::patch('/metodos/http', function () {
    return "hello word da rota(PATCH)";
});

route::options('/metodos/http', function () {
    return "hello word da rota(OPTIONS)";
});

route::post('/metodos/imprimir', function (Request $req) {
    $nome = $req->input('nome');
    $idade = $req->input('idade');
    return "hello word $nome ($idade)(POST)";
});

route::match(['get', 'post'], '/metodos/getPost', function () {
    return "Usando metodos get e post <br> <pre>route::match(['get','post']</pre>";
});

route::any('/metodos/todos', function () {
    return "todos as rotas usando any";
});

route::get('/produtos', function () {
    echo "<h1>PRODUTOS</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>PC Desktop</li>";
    echo "<li>Impressora</li>";
    echo "</ol>";
})->name('meusprodutos');

route::get('/linkProdutos', function () {
    $url = route('meusprodutos');
    echo "<a href=\"" . $url . "\">Meus Produtos</a>";
});

route::get('/redirecionarprodutos', function (){
    return redirect()->route('meusprodutos');
});
