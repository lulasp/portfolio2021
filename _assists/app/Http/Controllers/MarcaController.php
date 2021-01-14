<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;

use App\Http\Requests;

class MarcaController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(){

    //$pats = DB::table('pat')->get();
    $marcas = Marca::all();

    return view('marcas.index', compact('marcas'));
  }


  public function show(Marca $marca){

    $marcas = Marca::with(array('equipamento'))->get();

    return view('marcas.show', compact('marca', 'equipamento'));

  }

  public function edit(Marca $marca){

    return view('marcas.edit', compact('marca'));

  }

  public function update(Request $request, Marca $marca){

    $marca->update($request->all());

    return redirect('/marcas');
    //$request->all();

  }

  // create cat
  public function create(Request $request, Marca $marca){

    return view('marcas.create');
    //  return \View::make('categorias.create');

  }

  public function store(Request $request, Marca $marca){

    $this->validate($request, [

      'marca'=>'required'
    ]);

    $marca = new Marca;
    $marca->marca = $request->marca;

    $marca->save();

    return redirect('/marcas');
  }

  public function destroy($id){

    $marca = Marca::findOrFail($id);
    $marca->delete();
    //Session::flash('flash_message', 'PAT foi apagado');

    return redirect('/marcas');
  }

}
