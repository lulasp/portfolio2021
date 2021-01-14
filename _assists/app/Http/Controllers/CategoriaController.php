<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(){

    //$pats = DB::table('pat')->get();
    $categorias = Categoria::all();

    return view('categorias.index', compact('categorias'));
  }


  public function show(Categoria $categoria){

    $categorias = Categoria::with(array('equipamento'))->get();

    return view('categorias.show', compact('categoria'));

  }

  public function edit(Categoria $categoria){

    return view('categorias.edit', compact('categoria'));

  }

  public function update(Request $request, Categoria $categoria){

    $categoria->update($request->all());

    return redirect('/categorias');
    //$request->all();

  }

  // create cat
  public function create(Request $request, Categoria $categoria){

    return view('categorias.create');
    //  return \View::make('categorias.create');

  }

  public function store(Request $request, Categoria $categoria){

    $this->validate($request, [

      'categoria'=>'required'
    ]);

    $categoria = new Categoria;
    $categoria->categoria = $request->categoria;

    $categoria->save();

    return redirect('/categorias');
  }

  public function destroy($id){

    $categoria = Categoria::findOrFail($id);
    $categoria->delete();


    return redirect('/categorias');
  }

}
