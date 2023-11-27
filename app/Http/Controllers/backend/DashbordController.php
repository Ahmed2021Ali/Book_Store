<?php

namespace App\Http\Controllers\backend;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashbordController extends Controller
{
    public function index()
    {
/*         $user_count=DB::table('users')->count();
        $slider_count=DB::table('sliders')->where('status','1')->count();
        $banner_count=DB::table('banners')->where('status','1')->count(); */
        return view('backend.dashbord.index',/* compact('user_count','slider_count','banner_count') */);
    }

}
