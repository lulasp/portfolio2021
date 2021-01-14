<?php

namespace App\Http\Controllers;

use App\PAT;
use App\PATF;
use App\Search;
use App\Equipamento;
use App\Http\Requests;
use Request;
use DB;
use Auth;

class SearchController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function search(Request $request)
  {
     	// Gets the query string from our form submission
      $query = Request::input('top-search');
      // Returns an array of articles that have the query string located somewhere within
      // our articles titles. Paginates them so we can break up lots of search results.

      $pat = DB::table('pat')->where('id', 'LIKE', '%' . $query . '%')
      ->orWhere('descricaoAvaria', 'LIKE', '%' . $query . '%')
      ->orWhere('notas', 'LIKE', '%' . $query . '%')
      ->orWhere('idequipamento', 'LIKE', '%' . $query . '%')
      ->get();

      //$pat = PAT::with('equipamento')->get();

      $patf = DB::table('pat_fornecedor')->where('id', 'LIKE', '%' . $query . '%')->get();


      $cliente = DB::table('clientes')->where('id', 'LIKE', '%' . $query . '%')->get();

      $equipamento = DB::table('equipamentos')->where('nserie', 'LIKE', '%' . $query . '%')
      ->orWhere('marca_id', 'LIKE', '%' . $query . '%')
      ->orWhere('cliente_id', 'LIKE', '%' . $query . '%')
      ->orWhere('descricao', 'LIKE', '%' . $query . '%')
      ->orWhere('idCategoria', 'LIKE', '%' . $query . '%')
      ->get();


      $fornecedor = DB::table('fornecedores')->where('nome', 'LIKE', '%' . $query . '%')
      ->orWhere('email', 'LIKE', '%' . $query . '%')
      ->orWhere('telefone', 'LIKE', '%' . $query . '%')
      ->orWhere('fax', 'LIKE', '%' . $query . '%')
      ->get();

  	// returns a view and passes the view the list of articles and the original query.
    //dd($pat);
      return view('pages.search_results', compact('query', 'pat', 'patf', 'cliente', 'equipamento', 'fornecedor'));
   }
}
