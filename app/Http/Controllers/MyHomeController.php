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
	  
	  public function do_lobby()
	  {
	        $ip   = $_SERVER['REMOTE_ADDR'];
	        $port = $_SERVER['REMOTE_PORT'];
	        $connect_info = array("ip" => $ip, "port" => $port);
	        return view('lobby', ['mydata' => $connect_info]);
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
            
            DB::connection('mysql')->delete('DELETE FROM ActualCards WHERE player_id = 1');
            for ($ii=0; $ii < $current_deck_count; $ii++)
            {
                $dcindex = $ActualCards[$ii];
                $mystr = sprintf("INSERT ActualCards (myindex, player_id, deck_card_id, pic_filename, card_type, mana_cost, effects) VALUES ('%d', 1, '%d', '%s', '%s', '%s', '%d')", $ii, $rows[$dcindex]->id, $rows[$dcindex]->pic_filename, $rows[$dcindex]->card_type, $rows[$dcindex]->mana_cost, $rows[$dcindex]->effects);
                DB::connection('mysql')->insert($mystr);
            }
            
            DB::connection('mysql')->delete('DELETE FROM Hand WHERE player_id = 1');
            for ($ii=0; $ii < count($hand); $ii++)
            {
                $mystr = sprintf("INSERT Hand (myindex, player_id, deck_card_id, pic_filename, card_type, mana_cost, effects) VALUES ('%d', 1, '%d', '%s', '%s', '%s', '%d')", $ii, $hand[$ii]->id, $hand[$ii]->pic_filename, $hand[$ii]->card_type, $hand[$ii]->mana_cost, $hand[$ii]->effects);
                DB::connection('mysql')->insert($mystr);
            }
            
            
            
            $result = ["deck_name" => "red_deck", $hand];
	        return view('shuffle', ['mydata' => $result]);
	       
	      
	  }//do_shuffle

}//class