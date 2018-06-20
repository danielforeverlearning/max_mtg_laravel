<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\MyTestClass;

class MyHomeController extends Controller
{
      public $mytestobj = null;

      public function showbravo()
	  {
	       $this->mytestobj = new MyTestClass();
	       if (is_null($this->mytestobj))
	            $teststr = 'mytestobj is null';
	        else
	            $teststr = "mytestobj is NOT null myname is " . $this->mytestobj->myname;
		   return view('bravo', ['myteststr' => $teststr]);
	  }

	  public function showcharlie($name = 'defaultnamehere')
	  {
	        if (is_null($this->mytestobj))
	            $teststr = 'mytestobj is null';
	        else
	            $teststr = 'mytestobj is NOT null';
	       
		    return View::make('charlie', ['myviewname' => $name, 'myteststr' => $teststr]);
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