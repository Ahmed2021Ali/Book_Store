<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\FAQ\StoreFAQRequest;
use App\Http\Requests\FAQ\UpdateFAQRequest;
use App\Http\traits\media;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    use media;
    public $faqs;
    public function __construct()
    {
        $this->faqs = new Faq();
    }

    public function index()
    {
        return view('backend.Faq.index',['faqs' => $this->faqs->gatAllFaqs()]);
    }

    public function store(StoreFAQRequest $request)
    {
        $this->storeMethod($request,'Faq',null);
        return redirect()->back()->with(['success'=>'تم بنجاح اضافة السوال و الرد ']);
    }

    public function update(UpdateFAQRequest $request,$faq)
    {
        $faq=Faq::findOrFail($faq);
        $faq->update($request->validated());
       return redirect()->back()->with(['success'=>' تم بنجاح تحديث السوال  و الرد']);
    }

    public function destroy($faq)
    {
        Faq::where('id',$faq)->delete();
        return redirect()->back()->with(['success'=>' تم بنجاح حذف السوال و الرد']);
    }
}
