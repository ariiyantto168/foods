<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use App\Models\Sellings;
use App\Models\SellingsDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class SellingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contents = [
            'sellings' => Sellings::all(),
        ];

        $pagecontent = view('sellings.index',$contents );

        // masterpage
        $pagemain = array(
            'title' => 'Makan yuk sepuasnya',
            'menu' => 'sellngs',
            'submenu' => '',
            'pagecontent' => $pagecontent
        );
        
        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $contents = [
            // 'orders' => $order,
             'foods' => Foods::where('active', TRUE)->get()
          ];
        $pagecontent = view('sellings.create',$contents);
  
      //masterpage
      $pagemain = array(
          'title' => 'Makan yuks',
          'menu' => 'sellings',
          'submenu' => '',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        // return $request->all();
        $request->validate([
            'date' ,
            'money' => 'required',
          ]);        

        // return $request->all();
        $quantity = $request->quantity;
        $totalsendiri = $request->totalsendiri;
        $foods = $request->idfoods;
        $fds = count($foods);

        for ($i=0; $i < $fds; $i++) {
            if($foods[$i] == 0) {
                return redirect()->back()->with('status_eror', 'Foods empty');
            }elseif ($quantity[$i] == 0){
                return redirect()->back()->with('status_eror', 'Quantity empty');
            }elseif ($totalsendiri[$i] == 0){
                return redirect()->back()->with('status_eror', 'Total empty');
            }
        }

        $saveSellings = new Sellings;
        $saveSellings->code = $this->get_code();
        $saveSellings->date = date('Y-m-d H:i:s');
        $saveSellings->total = $request->totalall;
        $saveSellings->money = $request->money;
        $saveSellings->change = $request->change;
        $saveSellings->save();

        for ($i=0; $i < $fds; $i++){
            $saveSellingsDetails = new SellingsDetails;
            $saveSellingsDetails->idsellings = $saveSellings->idsellings;
            $saveSellingsDetails->idfoods = $foods[$i];
            $saveSellingsDetails->quantity = $quantity[$i];
            $saveSellingsDetails->total = $totalsendiri[$i];
            $saveSellingsDetails->save();
        }
        // return $request->all();

        return redirect('sellings')->with('status_success','Sellings updated');
    }

    public function update_page(Sellings $selling)
    {
        $seliings = Sellings::with([
            'sellings_details' => function($sd){
                $sd->with('foods');
            }
        ])->where('idsellings',$selling->idsellings)
        ->first();

        $contents = [
            'selling' => $selling,
            'foods' => Foods::where('active', true)->get(),
        ];

        $pagecontent = view('sellings.update',$contents);

        // masterpage
        $pagemain = array(
          'title' => 'Makan yuks',
          'menu' => 'sellings',
          'submenu' => '',
          'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Sellings $selling)
    {
        // return $request->all();


    }


    public function get_code()
    {
        $date_ym = date('ym');
        $date_between = [date('Y-m-01 00:00:00'), date('Y-m-t 23:59:59')];
        
        $dataSellings = Sellings::select('code')
  			->whereBetween('created_at',$date_between)
  			->orderBy('code','desc')
              ->first();
        
              if(is_null($dataSellings)) {
                $nowcode = '00001';
            } else {
                $lastcode = $dataSellings->code;
                $lastcode1 = intval(substr($lastcode, -5))+1;
                $nowcode = str_pad($lastcode1, 5, '0', STR_PAD_LEFT);
            }
  
            return 'PO-'.$date_ym.'-'.$nowcode;
    }

    
}
