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
        Category::create($request->validated());
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
        $category->update($request->validated());
        return redirect()->back()->with(['success'=>' تم بنجاح تحديث القسم']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with(['success'=>' تم بنجاح حذف القسم']);
    }

}
