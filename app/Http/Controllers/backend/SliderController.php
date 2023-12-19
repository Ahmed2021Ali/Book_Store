<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\slider\SliderStoreRequest;
use App\Http\Requests\slider\SliderUpdateRequest;
use App\Http\traits\media;
use App\Models\Slider;
use Illuminate\Support\Arr;

class SliderController extends Controller
{
    use media;

    public $sliders;
    public function __construct()
    {
        $this->sliders = new Slider();
    }

    public function index()
    {
        return view('backend.slider.index',['sliders'=>$this->sliders->getAllSliders()]);
    }

    public function store(SliderStoreRequest $request)
    {
        $this->storeMethod($request,'Slider','sliders');
        return redirect()->back()->with(['success'=>'تم بنجاح اضافة الصورة']);
    }


    public function update(SliderUpdateRequest $request, Slider $slider)
    {
        $data = $request->validated();
        if(isset($data['image'])) {
            $this->deletePhoto($slider->image,'banners');
            $PhotoName = $this->uploadPhoto($data['image'],'banners');
        }
        $slider->update([
            ...Arr::except($data,['image']),
            'image' => isset($data['image']) ? $PhotoName : $slider->image
        ]);
        return redirect()->back()->with(['success'=>' تم بنجاح تحديث الصورة و العرض']);
    }

    public function destroy(Slider $slider)
    {
        $this->deletePhoto($slider->image,'sliders');
        $slider->delete();
        return redirect()->back()->with(['success'=>' تم بنجاح حذف الصورة']);
    }
}
