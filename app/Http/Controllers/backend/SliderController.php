<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\slider\SliderUpdateRequest;
use App\Models\Slider;
use App\Http\traits\media;
use App\Http\Controllers\Controller;
use App\Http\Requests\slider\SliderStoreRequest;

class SliderController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders=Slider::select('id','image','status')->paginate(7);
        return view('backend.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderStoreRequest $request)
    {
        $photoName = $this->uploadPhoto($request->image,'slider');
        $data = $request->except('_token');
        $data['image'] = $photoName;
        Slider::insert($data);
        return redirect()->back()->with(['success'=>'تم بنجاح اضافة الصورة']);
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $slider=Slider::findOrFail($id);
         return view('backend.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id)
    {
        $data = $request->except('_token','_method','image');
         if($request->has('image'))
         {
            $old_photo=Slider::where('id',$id)->first()->image;
            $photo_path=public_path('/assets/images/slider/').$old_photo;
             $this->deletePhoto($photo_path);

            $PhotoName = $this->uploadPhoto($request->image,'slider');
             $data['image']=$PhotoName;
        }

        Slider::where('id',$id)->update($data);
        return redirect()->back()->with(['success'=>' تم بنجاح تحديث الصورة و العرض']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $old_photo=Slider::where('id',$id)->first()->image;
        $photo_path=public_path('/assets/images/slider/').$old_photo;
        $this->deletePhoto($photo_path);
        Slider::where('id',$id)->delete();
        return redirect()->back()->with(['success'=>' تم بنجاح حذف الصورة']);
    }
}
