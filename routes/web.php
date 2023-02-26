<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Usa parâmetros opcionais 
Route::get(
    '/contato/{nome}/{categoria}/{assunto}/{mensagem?}', 
    function(
        string $nome, 
        string $categoria, 
        string $assunto, 
        string $mensagem = 'parâmetro opcional'
    ){
        echo 'Parâmetros opcionais: '.$nome.' - '.$categoria. ' - '.$assunto. ' - '.$mensagem;
    }
);


// Faz um tratamento para verificar se o primeiro parâmetro é uma string e se o segundo é um número,
// ambos não vazios 
Route::get(
    '/contato/{nome}/{categoria_id}', 
    function(
        string $nome, 
        string $categoria_id, 
    ){
        echo "Tratamento de string e números: $nome - $categoria_id";
    }
)
->where('nome', '[A-Za-z]+')
->where('categoria_id', '[0-9]+');

Route::get('/', [PrincipalController::class, 'principal']);

Route::get('/contato', [ContatoController::class, 'contatoGet']);
Route::post('/contato', [ContatoController::class, 'contatoPost']);

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos']);

Route::get('/login', function(){
    return 'Login';
});

// Agrupa as rotas para um mesmo prefixo, no caso o prefixo "app" 
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){
        return 'Cliente';
    });
    Route::get('/fornecedores', function(){
        return 'Fornecedores';
    });
    Route::get('/produtos', function(){
        return 'Produtos';
    });
});

// Cria uma rota default para ser executada quando o usuário acessar uma rota que não existe 
Route::fallback(function(){
    echo "A rota acessada não existe. Clique aqui para ir para página inicial";
});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste']);


