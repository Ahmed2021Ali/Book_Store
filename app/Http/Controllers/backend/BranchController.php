<?php

namespace App\Http\Controllers\backend;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\book\UpdateBookRequest;
use App\Http\Requests\branch\StoreBranchRequest;
use App\Http\Requests\branch\UpdateBranchRequest;

class BranchController extends Controller
{

    public function index()
    {
        $branches=Branch::paginate(7);
        return view('backend.branch.index',compact('branches'));
    }

    public function create()
    {
        return view('backend.branch.create');
    }

    public function store(StoreBranchRequest $request)
    {
        $data = $request->except('_token');
        Branch::insert($data);
        return redirect()->back()->with(['success'=>'تم بنجاح اضافة العنوان']);
    }
    
    public function edit(Branch $branch)
    {
        return view('backend.branch.edit',compact('branch'));
    }

    public function update(UpdateBranchRequest $request, $id)
    {
        $data = $request->except('_token','_method');
        Branch::where('id',$id)->update($data);
       return redirect()->back()->with(['success'=>'تم بنجاح تحديث العنوان ']);
    }

    public function destroy($id)
    {
        Branch::where('id',$id)->delete();
        return redirect()->back()->with(['success'=>' تم بنجاح حذف العنوان']);
    }
}
