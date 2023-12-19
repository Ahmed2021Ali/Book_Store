<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\contact\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Http\traits\media;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use media;
    public $contacts;

    public function __construct()
    {
        $this->contacts = new Contact();
    }

    public function index()
    {
        return view('backend.contact_us.index',['contacts' => $this->contacts->getAllContacts()]);
    }

    public function store(StoreContactRequest $request)
    {
        $this->storeMethod($request,'Contact',null);
        return redirect()->back()->with(['success'=>'سيتم التواصل معك في اقرب وقت']);
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());
        return redirect()->back()->with(['success'=>' تم بنجاح التحديث ']);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back()->with(['success'=>' تم بنجاح الحذف ']);
    }
}
