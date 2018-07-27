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
	      
	        $total_deck_count = 0;
	        $ActualCards = array();
	        for ($ii=0; $ii < count($rows); $ii++)
	        {
	          $total_deck_count += $rows[$ii]->card_count;
	          for ($cc=0; $cc < $rows[$ii]->card_count; $cc++)
	              array_push($ActualCards, $ii);
	        }
	      
	        list($usec, $sec) = explode(' ', microtime());
	        srand($sec + $usec * 1000000);
	      
	        $myrand = array();
	        for ($ii = 0; $ii < $total_deck_count; $ii++)
	          array_push($myrand, rand());
	          
	        //So now you got 2 arrays: ActualCards and myrandlist
            //ok ok let us just do bubble-sort, i know it is O(n^2) ok ok,
            //i am just lazy and tired to learn something new, please
            //dang dude you could have just used List<int>.Sort() method gosh
            $loopcount = 0;
            $lastcardindex = $total_deck_count - 1;
            $didswap = true;
          
            while ($didswap)
            {
                $didswap = false;
                $loopcount++;
                for ($cc = 0; $cc <= $lastcardindex; $cc++)
                {
                    if ($cc == $lastcardindex) //no pairs of cards left
                    {
                        break;
                    }

                    $AA = $myrand[$cc];
                    $BB = $myrand[$cc + 1];
                    if ($BB < $AA)
                    {
                        $didswap = true;
                        $myrand[$cc] = $BB;
                        $myrand[$cc + 1] = $AA;

                        $temp = $ActualCards[$cc];
                        $ActualCards[$cc] = $ActualCards[$cc + 1];
                        $ActualCards[$cc + 1] = $temp;
                    }
                }
                $lastcardindex--;
            }
            
            //printf("ActualCards count = %d", count($ActualCards));
          
            
            //draw 7 cards
            //bottom of ActualCards array is actually top of physical card deck
            $hand = array();
            $current_deck_count = $total_deck_count;
            $actualcardsdrawncount = 0;
            while ($actualcardsdrawncount < 7)
            {
                if ($current_deck_count > 0)
                {
                    $dcindex = $ActualCards[$current_deck_count - 1];
                    
                    //printf("dcindex = %d", $dcindex);
                    
                    $current_deck_count--;
                    array_push($hand, $rows[$dcindex]);
                    $actualcardsdrawncount++;
                }
                else
                    break;
            }
            
            $result = ["deck_name" => "red_deck", $hand];
	        return view('shuffle', ['mydata' => $result]);
	       
	      
	  }//do_shuffle

}//class