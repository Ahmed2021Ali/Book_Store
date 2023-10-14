<?php

namespace App\Http\Controllers\backend;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\category\StoreCategoryRequest;
use App\Http\Requests\category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::paginate(7);
        return view('backend.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->except('_token');
        Category::insert($data);
        return redirect()->back()->with(['success'=>'تم بنجاح اضافة القسم']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $books=Book::where('category_id',$id)->paginate(6);
        return view('backend.books.index',compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UpdateCategoryRequest $category,$id)
    {
        $data = $request->except('_token','_method');
        Category::where('id',$id)->update($data);
        return redirect()->back()->with(['success'=>' تم بنجاح تحديث القسم']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $id=$category->id;
        Category::where('id',$id)->delete();
        return redirect()->back()->with(['success'=>' تم بنجاح حذف القسم']);
    }
}
