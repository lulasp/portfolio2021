<?php

namespace App\Http\Controllers;

//use DB;
use App\Cliente;
use App\Equipamento;
use App\Status;
use App\Categoria;
use App\PATF;
use App\PAT;
use App\Marca;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClienteController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

      //$pats = DB::table('pat')->get();
      $clientes = Cliente::get();

      return view('clientes.index', compact('clientes'));
    }



    public function show(Cliente $cliente){

      $clientes = Cliente::with(array('equipamento'))->get();

      return view('clientes.show', compact('cliente', 'equipamento'));

    }

    //chama form para create
    public function create(Request $request, Cliente $cliente){

    //  return $cliente;

      return view('clientes.create');
      //dd($request->all());

    }

    public function store(Request $request, Cliente $cliente){

      $this->validate($request, [

        'nome'=>'required',
        'email'=>'required',
        'telefone'=>'required'
      ]);

      $cliente = new Cliente;
      $cliente->nome = $request->nome;
      $cliente->email = $request->email;
      $cliente->telefone = $request->telefone;
      $cliente->fax = $request->fax;

      $cliente->save();

      return redirect('/clientes');
    }

    public function edit(Cliente $cliente){

      return view('clientes.edit', compact('cliente'));

    }

    public function update(Request $request, Cliente $cliente){

      $cliente->update($request->all());

      return redirect('/clientes');

      //$request->all();

    }

    public function destroy($id){

      $cliente = Cliente::findOrFail($id);
      $cliente->delete();


      return redirect('/clientes');
    }



}
