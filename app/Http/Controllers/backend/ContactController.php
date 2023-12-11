<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\contact\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts=Contact::paginate(7);
        return view('backend.contact_us.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contact_us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $data = $request->except('_token');
        Contact::insert($data);
        return redirect()->back()->with(['success'=>'سيتم التواصل معك في اقرب وقت']);
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('backend.contact_us.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token','_method');
        Contact::where('id',$id)->update($data);
        return redirect()->back()->with(['success'=>' تم بنجاح التحديث ']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Contact::where('id',$id)->delete();
        return redirect()->back()->with(['success'=>' تم بنجاح الحذف ']);
    }
}
