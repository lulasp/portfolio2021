<?php

namespace App\Http\Controllers;

use DB;
use App\PAT;
use App\Cliente;
use App\status;
use App\Equipamento;
use App\Categoria;
use App\PATF;
use App\User;
use Auth;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Http\Requests;

class PatController extends Controller
{
  //

  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(PAT $pat){

    //$pats = DB::table('pat')->get();
    $pats = PAT::with(array('cliente', 'equipamento', 'status', 'patf', 'user'))->get();


    return view('pats.index', compact('pats'));
  }


  public function history(PAT $pat){

    $pats = PAT::with(array('cliente', 'equipamento', 'status', 'patf', 'user'))->where('status_id', '=', 7)->get();


    return view('pats.history', compact('pats'));


  }


  public function show(Pat $pat){

    $pats = PAT::with(array('equipamento', 'patf'))->get();

    //dd($pats);
    return view('pats.show', compact('pat', 'equipamento', 'patf'));

  }


  public function edit(Pat $pat){

    $items = Equipamento::pluck('nserie', 'id');
    $items2 = status::pluck('pat_status', 'id');

    $equipamentos = Equipamento::with(array('marca'))->get();

    //$items3 = PATF::pluck('id', 'id');

    return view('pats.edit', compact('pat', 'items', 'items2', 'equipamentos'));

  }

  public function update(Request $request, Pat $pat){

    $pat->update($request->all());

    return redirect('/pats');
    //$request->all();

  }

  public function destroy($id){

    $pat = Pat::findOrFail($id);
    $pat->delete();

    return redirect('/pats');
  }

  // create PAT
  public function create(Request $request, Pat $pat){

    $pats = PAT::with(array('cliente', 'equipamento'))->get();

    $equipamentos = Equipamento::with(array('marca'))->get();

    $items = Equipamento::pluck('nserie', 'id');

    $items2 = Status::pluck('pat_status', 'id');


    return view('pats.create', compact('pats', 'items', 'items2', 'equipamentos'));


  }

  public function store(Request $request, Pat $pat){

    $this->validate($request, [

      'idequipamento'=>'required',
      'data'=>'required',
      'status_id'=>'required',
      'descricaoAvaria'=>'required',
      'notas'=>'required',

    ]);


    $pat = new Pat;
    $pat->user_id = Auth::user()->id;
    $pat->idequipamento = $request->idequipamento;
    $pat->data = $request->data;
    $pat->status_id = $request->status_id;
    $pat->descricaoAvaria = $request->descricaoAvaria;
    $pat->notas = $request->notas;
    $pat->descricaoReparacao = $request->descricaoReparacao;
    $pat->dataConclusao = $request->dataConclusao;
    //Auth::user()->pats()->create($pat);

    $pat->save();

    //email data
    $data = array(

      'name' => $pat->user->name,
      'pat' => $pat->id,
      'cliente' => $pat->equipamento->first()->cliente->nome,
      'equipamento' => $pat->equipamento->first()->nserie,
      'marca'=> $pat->equipamento->first()->marca->marca,
      'categoria'=> $pat->equipamento->first()->categoria->categoria,
      'status' => $pat->status->pat_status,
      'data' => $pat->data,
      'descricao' => $pat->descricaoAvaria,
      'notas' => $pat->notas,
      'descricaoReparacao' => $pat->descricaoReparacao,
      'dataConclusao' => $pat->dataConclusao

    );


    Mail::send('emails.test', $data, function($message){

      $message->to('lula__sp@hotmail.com', 'FastLuza P.A.T Manager')->subject('Foi inserido um P.A.T.');
      //return redirect()->route('home');
    });


    return redirect('/pats');

  }



}
