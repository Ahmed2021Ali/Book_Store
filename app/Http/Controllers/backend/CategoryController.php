<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\category\StoreCategoryRequest;
use App\Http\Requests\category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public $categories;

    public function __construct()
    {
        $this->categories = new Category();
    }

    public function index()
    {
        return view('backend.category.index',[
            'categories' => $this->categories->getAllCategories(),
            ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        storeMethod($request,'Category',null);
        return redirect()->back()->with(['success'=>'تم بنجاح اضافة القسم']);
    }

    public function show(Category $category)
    {
        return view('backend.books.index',[
            'books'=>$category->book
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        updateMethod($request, $category, null);
        return redirect()->back()->with(['success'=>' تم بنجاح تحديث القسم']);
    }

    public function destroy(Category $category)
    {
        deleteMethod($category,null);
        return redirect()->back()->with(['success'=>' تم بنجاح حذف القسم']);
    }

}
