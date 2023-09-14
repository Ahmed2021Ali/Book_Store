<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\FAQ\StoreFAQRequest;
use App\Http\Requests\FAQ\UpdateFAQRequest;
use App\Models\FAQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $FAQs=FAQ::select('id','question','answer','status')->paginate(7);
        return view('backend.FAQ.index',compact('FAQs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.FAQ.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFAQRequest $request)
    {
        $data = $request->except('_token');
        FAQ::insert($data);
        return redirect()->back()->with('success','تم بنجاح اضافة السوال و الرد ');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FAQ $fAQ , $id)
    {
        $fAQ=FAQ::findOrFail($id);
        return view('backend.FAQ.edit',compact('fAQ'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFAQRequest $request, FAQ $fAQ, $id)
    {
        $data = $request->except('_token','_method');
        FAQ::where('id',$id)->update($data);
       return redirect()->back()->with('success',' تم بنجاح تحديث السوال  و الرد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $fAQ,$id)
    {
        FAQ::where('id',$id)->delete();
        return redirect()->back()->with('success',' تم بنجاح حذف السوال و الرد');
    }
}
