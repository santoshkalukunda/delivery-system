<?php

namespace App\Http\Controllers;

use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Branch $branch=null)
    {
        if (!$branch) {
            $branch = new Branch;
        }
        $branches=Branch::latest()->paginate(20);
        return view('branch.index',compact('branches','branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
        Branch::create($request->validated());
        return redirect()->back()->with('success', 'Branch Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return $this->index($branch);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(BranchRequest $request, Branch $branch)
    {
        $branch->update($request->validated());
        return redirect()->route('branches.index')->with('success', 'Branch Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->back()->with('success','Branch Deleted');
    }

    public function search(Request $request){
        $branches = new Branch;
        if ($request->has('name')) {
            if ($request->name != null)
                $branches = $branches->where('name', 'LIKE', ["$request->name%"]);
        }
        $branches=$branches->paginate(20);
        $branch=null;
        if (!$branch) {
            $branch = new Branch;
        }
        return view('branch.index',compact('branches','branch'));
    }
}
