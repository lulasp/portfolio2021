<?php

namespace App\Http\Controllers;

//use DB;
use App\PATF;
use App\Fornecedor;
use App\PAT;
use App\Cliente;
use Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Http\Requests;

class PatFController extends Controller
{
  //

  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(){

    //$pats = DB::table('pat')->get();

    $patsf = PATF::get();
    //  $pats = Cliente::with('patR')->get();
    //dd($pats);

    return view('patsf.index', compact('patsf'));
  }


  public function show(PatF $patf){

    return view('patsf.show', compact('patf'));

  }
  // create PAT
  public function create(Request $request, PatF $patf){

    $pats = PAT::with(array('cliente', 'equipamento'))->get();

    $items = PAT::orderBy('id')->pluck('id','id');
    $items2 = Fornecedor::pluck('nome','id');

    return view('patsf.create', compact('patsf', 'items', 'items2', 'pats'));
    //  return \View::make('categorias.create');

  }

  public function store(Request $request, PatF $patf){

    $this->validate($request, [
      'idFornecedor'=>'required',
      'pat_id'=>'required',
      'dataEnvioFornecedor'=>'required',
      'file' => 'required',
    ]);

    $filePath = 'uploads';
    $file = Input::file('file');
    $filename = $file->getClientOriginalName();
    $request->file->move($filePath, $filename);


    $patf = new PatF;
    $patf->idFornecedor = $request->idFornecedor;
    $patf->pat_id = $request->pat_id;
    $patf->dataEnvioFornecedor = $request->dataEnvioFornecedor;
    $patf->docEnvioPath = $filename;
    $patf->dataRecepcao = $request->dataRecepcao;

    $patf->save();



    return redirect('/patsf');

  }

  public function edit(PATF $patf){

    $items = PAT::pluck('id','id');
    $items2 = Fornecedor::pluck('nome','id');

    $pats = PAT::with(array('cliente', 'equipamento'))->get();


    return view('patsf.edit', compact('patf', 'items', 'items2', 'pats'));


  }

  public function update(Request $request, PATF $patf){

   $patf->update($request->all());

    return redirect('/patsf');
    //$request->all();

  }


  public function destroy($id){

    $patf = PatF::findOrFail($id);
    $patf->delete();
    //Session::flash('flash_message', 'PAT foi apagado');

    return redirect('/patsf');
  }
}
