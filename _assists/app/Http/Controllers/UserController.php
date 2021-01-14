<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use DB;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }


  public function index(){

    //$pats = DB::table('pat')->get();
    //$users = User::all();
    $users = DB::table('users')->get();

    return view('users.index', compact('users'));
  }

  public function show(User $user){


    $users = User::with(array('pat'))->get();


    return view('users.show', compact('user'));

  }

  // form edit users
  public function edit(User $user){

    return view('users.edit', compact('user'));

  }
    // update users
  public function update(Request $request, User $user){

    //$user->update($request->all());
     $user->update($request->all());


    return redirect('/users');
    //$request->all();

  }

  // create users
  public function create(Request $request, User $user){

    return view('users.create');
    //  return \View::make('categorias.create');

  }

  public function store(Request $request, User $user){

    $this->validate($request, [

      'name' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|min:6|confirmed',
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;

    $user->save();

    return redirect('/users');
  }

  public function destroy($id){

    $user = User::findOrFail($id);
    $user->delete();
    //Session::flash('flash_message', 'PAT foi apagado');

    return redirect('/users');
  }

}
