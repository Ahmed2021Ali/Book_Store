<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\FAQ\StoreFAQRequest;
use App\Http\Requests\FAQ\UpdateFAQRequest;
use App\Models\Faq;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public $faqs;
    public function __construct()
    {
        $this->faqs = new Faq();
    }

    public function index()
    {
        return view('backend.Faq.index',['Faqs' => $this->faqs->gatAllFaqs()]);
    }

    public function store(StoreFAQRequest $request)
    {
        storeMethod($request,'Faq',null);
        return redirect()->back()->with(['success'=>'تم بنجاح اضافة السوال و الرد ']);
    }

    public function update(UpdateFAQRequest $request, Faq $Faq)
    {
        updateMethod($request,'Faq',null);
        return redirect()->back()->with(['success'=>' تم بنجاح تحديث السوال  و الرد']);
    }

    public function destroy(Faq $Faq)
    {
        deleteMethod($Faq,null);
        return redirect()->back()->with(['success'=>' تم بنجاح حذف السوال و الرد']);
    }
}
