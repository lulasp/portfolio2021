<?php

namespace App\Http\Controllers;

use App\Status;

use Illuminate\Http\Request;

use App\Http\Requests;

class StatusController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(){

    //$pats = DB::table('pat')->get();
    $statuses = Status::all();

    return view('statuses.index', compact('statuses'));
  }

  public function show(status $status){

    $statuses = status::with(array('pats'))->get();

    //$status = status::all();
    //dd($status);

    return view('statuses.show', compact('status', 'pats'));

  }
}
