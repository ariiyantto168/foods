<?php

namespace App\Http\Controllers;

use App\Models\Foods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use File;
use Illuminate\Support\Str;
use Image;

class FoodsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $contents = [
            'foods' => Foods::all(),
        ];

        $pagecontent = view('foods.index',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Master Foods',
            'menu' => 'master',
            'submenu' => 'foods',
            'pagecontent' => $pagecontent
        );

        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $pagecontent = view('foods.create');
  
      //masterpage
      $pagemain = array(
          'title' => 'Makan yuks',
          'menu' => 'foods',
          'submenu' => 'foods',
          'pagecontent' => $pagecontent,
      );
  
      return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        // return $request->all();

        $request->validate([
            'namefoods' => 'required',
            'price' => 'required',
            'hargadasar' => 'required',
            'laba' => 'required',
            'description' => 'required',
            'status' => '',
            'images' => 'required|file|mimes:jpeg,png,jpg|max:1024'
        ]);

        //active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveFoods = new Foods;
        $saveFoods->namefoods = $request->namefoods;
        $saveFoods->price = $request->price;
        $saveFoods->hargadasar = $request->hargadasar;
        $saveFoods->laba = $request->laba;
        $saveFoods->description = $request->description;
        $saveFoods->active = $active;
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/foods_images/' . $re_image) );
            $saveFoods->images = $re_image;
        }

         // return $request->file('images');
         // return $saveFoods;
        $saveFoods->save();
        return redirect('foods')->with('status_success','Created foods');
    }

    public function update_page(Foods $foods)
    {
        $contents = [
            'foods' => Foods::find($foods->idfoods)
        ];

        // return $content;

        $pagecontent = view('foods.update',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Foods',
            'menu' => 'foods',
            'submenu' => 'foods',
            'pagecontent' => $pagecontent
        );

        
        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request,Foods $foods)
    {
    	// return $request->all();
    	$request->validate([
            'namefoods' => 'required',
            'price' => 'required',
            'hargadasar' => 'required',
            'laba' => 'required',
            'photos' => 'file|mimes:jpeg,png,jpg|max:1024|dimensions:max_width=1000,max_height=1000',
            'description' => 'required',
            'status' => ''
        ]);

        //active
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $updateFoods = Foods::find($foods->idfoods);
        $updateFoods->namefoods = $request->namefoods;
        $updateFoods->price = $request->price;
        $updateFoods->hargadasar = $request->hargadasar;
        $updateFoods->laba = $request->laba;
        $updateFoods->description = $request->description;
        $updateFoods->active = $active;

        // jika images null
        

        $updateFoods->save();
        return redirect('foods')->with('status_success','Created foods');

    }

    public function change_image(Request $request,Foods $foods)
    {
        $save_image = Foods::find($foods->idfoods);
        
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/foods_images/' . $re_image) );
            $save_image->images = $re_image;
        }

        $save_image->save();

        return redirect('foods/update/'.$foods->idfoods)->with('status_success','Change  Image');
        // $request->file('images');
    }   

    
}
