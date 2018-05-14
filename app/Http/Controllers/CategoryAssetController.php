<?php

namespace App\Http\Controllers;
use App\CategoryAsset;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryAsset=CategoryAsset::all()->where('status',1);
        return view('admin_categoryasset',compact('categoryAsset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        CategoryAsset::create($request->except(['_token']));
             return redirect('admin_categoryasset');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CategoryAsset::create($request->except(['_token']));
        return redirect('admin_categoryasset')->with(session()->flash('lele',''));;    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin_categoryasset=CategoryAsset::find($id);
        $admin_categoryasset->name_category = $request->name_category;
        $admin_categoryasset->details = $request->details;
        $admin_categoryasset->save();
        return redirect('admin_categoryasset')->with(session()->flash('gogo',''));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $categoryAsset =CategoryAsset::find($id);
       // $categoryAsset->delete();
       // return view('admin_categoryasset')->with('success','Procuct has ben delete');
        $categoryAsset=DB::table('category_assets')->where('id',$id)
        ->update(['status'=>'0']);
         return back();
    }
}
