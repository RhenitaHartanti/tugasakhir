<?php

namespace App\Http\Controllers;
use App\Package;
use App\Asset;
use App\AssetPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asset=Asset::all();
        $package=Package::with('assets')->where('type','default')->get();
        return view('admin_listpackage')
        ->with('packages',$package)
        ->with('assets',$asset);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   {
    
        $paket = Package::create($request->except(['_token']));
        $paket->assets()->sync($request->id_asset);
        return redirect('admin_listpackage');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = Package::create($request->except(['_token']));     
        $package->assets()->sync($request->id_asset);
        return redirect('admin_listpackage'); 
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
      $admin_listpackage = Package::find($id);
      $admin_listpackage->update($request->
        except(['_token','_method','id','id_asset']));
      $admin_listpackage->assets()->sync($request->id_asset);
      return redirect('admin_listpackage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package =Package::find($id);
        $package->delete();
        return redirect('admin_listpackage');
    }
}
