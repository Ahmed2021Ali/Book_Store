<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\slider\SliderStoreRequest;
use App\Http\Requests\slider\SliderUpdateRequest;
use App\Models\Banner;

class BannerController extends Controller
{

    public function index()
    {
        $banners = Banner::select('id', 'image', 'status')->paginate(7);
        return view('backend.banner.index', compact('banners'));
    }

    public function store(SliderStoreRequest $request)
    {
        storeMethod($request, 'Banner', 'banners');
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة الصورة']);
    }

    public function update(SliderUpdateRequest $request, Banner $banner)
    {
        updateMethod($request, $banner, 'banners');
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث الصورة و العرض']);
    }

    public function destroy(Banner $banner)
    {
        deleteMethod($banner,'banners');
        return redirect()->back()->with(['success' => ' تم بنجاح حذف الصورة']);
    }
}
