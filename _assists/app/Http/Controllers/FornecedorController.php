<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

use App\Http\Requests;

class FornecedorController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(){

    $fornecedores = Fornecedor::all();

    return view('fornecedores.index', compact('fornecedores'));
  }

  public function show(Fornecedor $fornecedor){

    $fornecedores = Fornecedor::with(array('patf'))->get();

    return view('fornecedores.show', compact('fornecedor', 'patf'));

  }


  public function edit(Fornecedor $fornecedor){

    return view('fornecedores.edit', compact('fornecedor'));

  }

  public function update(Request $request, Fornecedor $fornecedor){

    $fornecedor->update($request->all());

    return redirect('/fornecedores');
    //$request->all();

  }
  // create fornecedores
  public function create(Request $request, Fornecedor $fornecedor){

    return view('fornecedores.create');

  }

  public function store(Request $request, Fornecedor $fornecedor){

    $this->validate($request, [

      'nome'=>'required',
      'email'=>'required',
      'telefone'=>'required'
    ]);

    $fornecedor = new Fornecedor;
    $fornecedor->nome = $request->nome;
    $fornecedor->email = $request->email;
    $fornecedor->telefone = $request->telefone;
    $fornecedor->fax = $request->fax;

    $fornecedor->save();

    return redirect('/fornecedores');
  }

  public function destroy($id){

    $fornecedor = Fornecedor::findOrFail($id);
    $fornecedor->delete();
    //Session::flash('flash_message', 'PAT foi apagado');

    return redirect('/fornecedores');
  }

}
