<?php

namespace App\Http\Controllers\backend;

use App\Http\traits\media;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\book\UpdateBookRequest;
use App\Http\Requests\branch\StoreBranchRequest;
use App\Http\Requests\branch\UpdateBranchRequest;

class BranchController extends Controller
{
    public $branches;
    public function __construct()
    {
        $this->branches = new Branch();
    }

    public function index()
    {
        return view('backend.branch.index',['branches' => $this->branches->gatAllBranches()]);
    }

    public function store(StoreBranchRequest $request)
    {
        storeMethod($request,'Branch',null);
        return redirect()->back()->with(['success'=>'تم بنجاح اضافة العنوان']);
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        updateMethod($request, $branch, null);
        return redirect()->back()->with(['success'=>'تم بنجاح تحديث العنوان ']);
    }

    public function destroy(Branch $branch)
    {
        deleteMethod($branch,null);

        return redirect()->back()->with(['success'=>' تم بنجاح حذف العنوان']);
    }
}
