<?php

namespace App\Http\Controllers;

use App\Equipamento;
use App\Categoria;
use App\Marca;
use App\Cliente;
use Illuminate\Http\Request;

use App\Http\Requests;

class EquipamentoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(){

    //$pats = DB::table('pat')->get();
    $equipamentos = Equipamento::with(array('marca'))->get();

    return view('equipamentos.index', compact('equipamentos', 'marca'));
  }


  public function show(Equipamento $equipamento){

    $equipamentos = Equipamento::with(array('pat'))->get();

    return view('equipamentos.show', compact('equipamento', 'pat'));

  }

  public function edit(Equipamento $equipamento){

    $items = Marca::pluck('marca', 'id');
    $items2 = Cliente::pluck('nome', 'id');
    $items3 = Categoria::pluck('categoria', 'id');


    return view('equipamentos.edit', compact('equipamento', 'items', 'items2', 'items3'));

  }

  public function update(Request $request, Equipamento $equipamento){

    $equipamento->update($request->all());

    return redirect('/equipamentos');
    //$request->all();

  }

  // create equipamento
  public function create(Request $request, Equipamento $equipamento){

    $items = Categoria::pluck('categoria', 'id');
    $items2 = Marca::pluck('marca', 'id');
    $items3 = Cliente::pluck('nome', 'id');

    return view('equipamentos.create', compact('equipamentos', 'items', 'items2', 'items3'));
  //  return \View::make('categorias.create');

  }

  public function store(Request $request, Equipamento $equipamento){

    $this->validate($request, [

      'nserie'=>'required',
      'marca_id'=>'required',
      'cliente_id'=> 'required',
      'descricao'=>'required',
      'idCategoria'=> 'required'
    ]);

    $equipamento = new Equipamento;
    $equipamento->nserie = $request->nserie;
    $equipamento->marca_id = $request->marca_id;
    $equipamento->cliente_id = $request->cliente_id;
    $equipamento->descricao = $request->descricao;
    $equipamento->idCategoria = $request->idCategoria;


    $equipamento->save();

    return redirect('/equipamentos');
  }

  public function destroy($id){

    $equipamento = Equipamento::findOrFail($id);
    $equipamento->delete();


    return redirect('/equipamentos');
  }


}
