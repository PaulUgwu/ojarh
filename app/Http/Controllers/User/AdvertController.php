<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Currency;
use App\Models\Generalsetting;
use App\Models\User;
use App\Models\Withdraw;
use App\Advert;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Input;
use Validator;

class AdvertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

  	public function index()
    {
        $adverts = Advert::where('user_id','=', Auth::guard('web')->user()->id)->orderBy('id','desc')->get();
        return view('user.advert.index',compact('adverts'));
    }

    public function create()
    {
        return view('user.advert.create' ,[
            'user' => FacadesAuth::user()
        ]);
    }


    public function store(Request $request)
    {

        $user = FacadesAuth::user();

        $new_advert = new Advert();

        if($request->hasFile('image')){
            $path = $request->image->store('public/adverts');
            $path_parts = pathinfo($path);
            $new_advert->image = $path_parts['basename'];
        }

        $new_advert->user_id     = $user->id;
        $new_advert->title       = $request->title;
        $new_advert->link        = $request->link;
        $new_advert->is_active   = 0;
        $new_advert->position    = $request->position;
        $new_advert->description = $request->description;
        $new_advert->payment_ref = $request->payment_ref;
        $result                  = $new_advert->save();

        if($result) {
            return redirect('user/adverts')->with([
                'message' => 'Your advert is waiting for admin approval'
            ]);
        }

        return redirect()->back()->with([
            'message' => 'your request was not completed please contact admin'
        ]);

    }
}
