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

    public $sliders;

    public function __construct()
    {
        $this->sliders = new Slider();
    }

    public function index()
    {
        return view('backend.slider.index', ['sliders' => $this->sliders->getAllSliders()]);
    }

    public function store(SliderStoreRequest $request)
    {
        storeMethod($request, 'Slider', 'sliders');
        return redirect()->back()->with(['success' => 'تم بنجاح اضافة الصورة']);
    }

    public function update(SliderUpdateRequest $request, Slider $slider)
    {
        updateMethod($request, $slider, null);
        return redirect()->back()->with(['success' => ' تم بنجاح تحديث الصورة و العرض']);
    }

    public function destroy(Slider $slider)
    {
        deleteMethod($slider, 'sliders');
        return redirect()->back()->with(['success' => ' تم بنجاح حذف الصورة']);
    }
}
