<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Advert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class AdvertController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** GET Request
    public function index()
    {
        $adverts = Advert::all();
        return view('admin.advert.index', [
            'adverts' => $adverts
        ]);
    }

    //*** GET Request
    public function create()
    {
        return view('admin.coupon.create');
    }

    public function toggle_status($id)
    {
        $advert = Advert::findOrFail($id);

        if($advert->is_active == 1) {
            $advert->is_active = 0;
            $advert->save();
        } else {
            $advert->is_active = 1;

            if($advert->ending_date == null) {
                $advert->ending_date = now()->addDays(30);
            }

            $advert->save();
        }

        return redirect()->back();
    }

}
