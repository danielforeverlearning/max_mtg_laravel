<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MyHomeController extends Controller
{

      public function showbravo()
	  {
		   return view('bravo');
	  }

	  public function showcharlie($name = 'defaultnamehere')
	  {
		   return View::make('charlie', ['myviewname' => $name]);
	  }
	  
	  public function showecho()
	  {
	      $rows = DB::connection('mysql')->select('select * from mytesttable');
	      return view('echo', ['myrows' => $rows]);
	  }
	  
	  public function do_shuffle()
	  {
	      $rows = DB::connection('mysql')->select('select * from red_deck');
	      $result = ["deck_name" => "red_deck", $rows];
	      return view('shuffle', ['mydata' => $result]);
	  }

}