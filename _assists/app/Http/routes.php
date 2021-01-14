<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');


Route::auth();

Route::get('/home', 'HomeController@index');

//test routes

Route::get('/about', function () {
    return view('pages.about');
});

//search routes

Route::resource('/search_results', 'SearchController@search');




/*
|--------------------------------------------------------------------------
| Pat Routes
|--------------------------------------------------------------------------
*/
Route::get('pats', 'PatController@index');

//history route
Route::get('pats/history', 'PatController@history');

Route::get('pats/create', 'PatController@create');
Route::post('pats/store', 'PatController@store');

Route::get('pats/{pat}', 'PatController@show');
Route::get('/pats/{pat}/edit', 'PatController@edit');
Route::patch('/pats/{pat}', 'PatController@update');
Route::get('/pats/{pat}/destroy', 'PatController@destroy');


/*
|--------------------------------------------------------------------------
| PatF Routes
|--------------------------------------------------------------------------
*/
Route::get('patsf', 'PatFController@index');

Route::get('patsf/create', 'PatFController@create');

Route::post('patsf/store', 'PatFController@store');
Route::get('patsf/{patf}', 'PatFController@show');
Route::get('/patsf/{patf}/edit', 'PatFController@edit');
Route::patch('/patsf/{patf}', 'PatFController@update');

Route::get('/patsf/{patf}/destroy', 'PatFController@destroy');


/*
|--------------------------------------------------------------------------
| Cliente Routes
|--------------------------------------------------------------------------
*/
Route::get('clientes', 'ClienteController@index');
Route::get('clientes/create', 'ClienteController@create');
Route::post('clientes/store', 'ClienteController@store');


Route::get('clientes/{cliente}', 'ClienteController@show');
Route::get('clientes/{cliente}/edit', 'ClienteController@edit');
Route::patch('/clientes/{cliente}', 'ClienteController@update');
Route::get('/clientes/{cliente}/destroy', 'ClienteController@destroy');


/*
|--------------------------------------------------------------------------
| Categoria Routes
|--------------------------------------------------------------------------
*/
Route::get('categorias', 'CategoriaController@index');
//add categoria
Route::get('categorias/create', 'CategoriaController@create');
Route::post('categorias/store', 'CategoriaController@store');

Route::get('categorias/{categoria}', 'CategoriaController@show');


Route::get('categorias/{categoria}/edit', 'CategoriaController@edit');
Route::patch('/categorias/{categoria}', 'CategoriaController@update');
Route::get('/categorias/{categoria}/destroy', 'CategoriaController@destroy');




/*
|--------------------------------------------------------------------------
| Equipamento Routes
|--------------------------------------------------------------------------
*/
Route::get('equipamentos', 'EquipamentoController@index');
//add equipamento
Route::get('equipamentos/create', 'EquipamentoController@create');
Route::post('equipamentos/store', 'EquipamentoController@store');

Route::get('equipamentos/{equipamento}', 'EquipamentoController@show');

Route::get('equipamentos/{equipamento}/edit', 'EquipamentoController@edit');
Route::patch('/equipamentos/{equipamento}', 'EquipamentoController@update');
Route::get('/equipamentos/{equipamento}/destroy', 'EquipamentoController@destroy');

/*
|--------------------------------------------------------------------------
| Marcas Routes
|--------------------------------------------------------------------------
*/
Route::get('marcas', 'MarcaController@index');

Route::get('marcas/create', 'MarcaController@create');
Route::post('marcas/store', 'MarcaController@store');

Route::get('marcas/{marca}', 'MarcaController@show');


Route::get('marcas/{marca}/edit', 'MarcaController@edit');
Route::patch('/marcas/{marca}', 'MarcaController@update');
Route::get('/marcas/{marca}/destroy', 'MarcaController@destroy');


/*
|--------------------------------------------------------------------------
| Fornecedor Routes
|--------------------------------------------------------------------------
*/
Route::get('fornecedores', 'FornecedorController@index');
//add fornecedores


Route::get('fornecedores/create', 'FornecedorController@create');
Route::post('fornecedores/store', 'FornecedorController@store');

Route::get('/fornecedores/{fornecedor}', 'FornecedorController@show');
Route::get('fornecedores/{fornecedor}/edit', 'FornecedorController@edit');
Route::patch('/fornecedores/{fornecedor}', 'FornecedorController@update');
Route::get('/fornecedores/{fornecedor}/destroy', 'FornecedorController@destroy');


/*
|--------------------------------------------------------------------------
| Status Routes
|--------------------------------------------------------------------------
*/
Route::get('statuses', 'StatusController@index');

Route::get('/statuses/{status}', 'StatusController@show');

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/

Route::get('users', 'UserController@index');

Route::get('users/create', 'UserController@create');
Route::post('users/store', 'UserController@store');

Route::get('users/{user}/edit', 'UserController@edit');
Route::patch('/users/{user}', 'UserController@update');
Route::get('/users/{user}/destroy', 'UserController@destroy');
Route::get('/users/{user}', 'UserController@show');


//email routes
Route::get('/email', 'EmailController@index');
