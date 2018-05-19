<?php

namespace App\Http\Controllers;
use App\Asset;
use App\CategoryAsset;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryAsset=CategoryAsset::all();
        //$asset=Asset::select(['assets.*','category_assets.name_category'])->join('category_assets','category_assets.id','=','assets.id_category_asset')->get()->where('status',1);
        $asset = Asset::where('status',1)->get();
        // dd($asset->asset_order);
        return view('admin_asset')        
        ->with('assets',$asset)
        ->with('category_assets',$categoryAsset);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         Asset::create($request->except(['_token']));
             return redirect('admin_asset');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Asset::create($request->except(['_token']));
             return redirect('admin_asset');  
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
    public function update(Request $request,$id)
    {
        $admin_asset=Asset::find($id);
        $admin_asset->id_category_asset = $request->id_category_asset;
        $admin_asset->name_asset = $request->name_asset;
        $admin_asset->price = $request->price;
        $admin_asset->total = $request->total;        
        $admin_asset->details = $request->details;
        $admin_asset->save();
        return redirect('admin_asset');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $asset =Asset::find($id);
        // $asset->delete();
        // return redirect('admin_asset')->with('success','Procuct has ben delete');
        $asset=DB::table('assets')->where('id',$id)
        ->update(['status'=>'0']);
         return back();
    }
}
