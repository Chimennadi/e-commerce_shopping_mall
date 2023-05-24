<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class IndexController extends Controller
{
    public function index() {
        $sliderBanners = Banner::where("type", "Slider")->where("status", 1)->get()->toArray();
        $fixBanners = Banner::where("type", "Fix")->where("status", 1)->get()->toArray();
        //dd($fixBanners);
        return view("front.index")->with(compact("sliderBanners", "fixBanners"));
    }
}
