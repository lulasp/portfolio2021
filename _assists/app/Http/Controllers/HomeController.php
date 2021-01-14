<?php

namespace App\Http\Controllers;

use App\PAT;
use App\PATF;
use App\Equipamento;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $count = DB::table('pat')->count();
      $countPATF = DB::table('pat_fornecedor')->count();
      $countClientes = DB::table('clientes')->count();
      $countEquipamentos = DB::table('equipamentos')->count();

      $pats = PAT::orderBy('created_at', 'desc')->take(6)->get();
      $patsf = PATF::orderBy('created_at', 'desc')->take(6)->get();
      $equipamento = Equipamento::orderBy('created_at', 'desc')->take(6)->get();
      
        return view('home', compact('count', 'countPATF', 'countClientes', 'countEquipamentos', 'pats', 'patsf', 'equipamento'));
    }
}
