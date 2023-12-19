<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\slider\SliderStoreRequest;
use App\Http\Requests\slider\SliderUpdateRequest;
use App\Http\traits\media;
use App\Models\Banner;
use Illuminate\Support\Arr;

class BannerController extends Controller
{
    use media;

    public function index()
    {
        $banners=Banner::select('id','image','status')->paginate(7);
        return view('backend.banner.index',compact('banners'));
    }

    public function store(SliderStoreRequest $request)
    {
        $data = $request->validated();
        $PhotoName = $this->uploadPhoto($data['image'],'banners');
        $data['image'] = $PhotoName;
        Banner::insert($data);
        return redirect()->back()->with(['success'=>'تم بنجاح اضافة الصورة']);
    }

    public function update(SliderUpdateRequest $request, Banner $banner)
    {
        $data = $request->validated();
         if(isset($data['image'])) {
             $this->deletePhoto($banner->image,'banners');
             $PhotoName = $this->uploadPhoto($data['image'],'banners');
        }
        $banner->update([
            ...Arr::except($data,['image']),
            'image' => isset($data['image']) ? $PhotoName : $banner->image
        ]);
        return redirect()->back()->with(['success'=>' تم بنجاح تحديث الصورة و العرض']);
    }

    public function destroy(Banner $banner)
    {
        $this->deletePhoto($banner->image,'banners');
        $banner->delete();
        return redirect()->back()->with(['success'=>' تم بنجاح حذف الصورة']);
    }
}
