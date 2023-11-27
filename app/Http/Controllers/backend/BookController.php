<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\book\StoreBookRequest;
use App\Http\Requests\book\UpdateBookRequest;
use App\Http\traits\media;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    use media;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books=Book::select('id','title','author_name','price','price_after_offer','status','image','category_id','quantity')->with('category')->paginate(4);
        return view('backend.books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::select('id','title')->get();
        return view('backend.books.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $photoName = $this->uploadPhoto($request->image,'book');
        $data = $request->except('_token');
        $data['image'] = $photoName;
        $price_after_offer =$this->price_after_offer($request->price,$request->offer);
        $data['price_after_offer'] = $price_after_offer;
        Book::insert($data);
        return redirect()->back()->with(['success'=>'تم بنجاح اضافة الكتاب']);

    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
       // $book=Book::where('id',$id)->first();
        $category=Category::select('id','title')->get();
        return view('backend.books.edit',compact('book','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, string $id)
    {
        $data = $request->except('_token','_method','image');
        if($request->has('image'))
        {
           $old_photo=Book::where('id',$id)->first()->image;
           $photo_path=public_path('/assets/images/book/').$old_photo;
            $this->deletePhoto($photo_path);

           $PhotoName = $this->uploadPhoto($request->image,'book');
            $data['image']=$PhotoName;
       }
       Book::where('id',$id)->update($data);
       return redirect()->back()->with(['success'=>'تم بنجاح تحديث الكتاب ']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $old_photo=Book::where('id',$id)->first()->image;
        $photo_path=public_path('/assets/images/book/').$old_photo;
        $this->deletePhoto($photo_path);
        Book::where('id',$id)->delete();
        return redirect()->back()->with(['success'=>' تم بنجاح حذف الكتاب']);
    }
}
