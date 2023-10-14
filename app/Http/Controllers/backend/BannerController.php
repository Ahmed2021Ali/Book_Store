<?php

namespace App\Http\Controllers\backend;

use App\Models\Banner;
use App\Http\traits\media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\slider\SliderStoreRequest;
use App\Http\Requests\slider\SliderUpdateRequest;

class BannerController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners=Banner::select('id','image','status')->paginate(7);
        return view('backend.banner.index',compact('banners'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderStoreRequest $request)
    {
        $photoName = $this->uploadPhoto($request->image,'banner');
        $data = $request->except('_token');
        $data['image'] = $photoName;
        Banner::insert($data);
        return redirect()->back()->with(['success'=>'تم بنجاح اضافة الصورة']);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner=Banner::findOrFail($id);
        return view('backend.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id)
    {
        $data = $request->except('_token','_method','image');
         if($request->has('image'))
         {
            $old_photo=Banner::where('id',$id)->first()->image;
            $photo_path=public_path('/assets/images/banner/').$old_photo;
             $this->deletePhoto($photo_path);

            $PhotoName = $this->uploadPhoto($request->image,'banner');
             $data['image']=$PhotoName;
        }

        Banner::where('id',$id)->update($data);
        return redirect()->back()->with(['success'=>' تم بنجاح تحديث الصورة و العرض']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $old_photo=Banner::where('id',$id)->first()->image;
        $photo_path=public_path('/assets/images/slider/').$old_photo;
        $this->deletePhoto($photo_path);
        Banner::where('id',$id)->delete();
        return redirect()->back()->with(['success'=>' تم بنجاح حذف الصورة']);
    }
}
