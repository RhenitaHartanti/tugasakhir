<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Package;
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
        $package=Package::all();
        return view('admin_listpackage',compact('package'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
   {
         Package::create($request->except(['_token']));
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
        Package::create($request->except(['_token']));
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
    public function update(Request $request, $id_package)
    {
        $admin_listpackage = Package ::find($id_package);
        $admin_listpackage->package_name = $request->package_name;
        $admin_listpackage->details = $request->details;
        $admin_listpackage->price = $request->price;
        $admin_listpackage->save();
        return redirect('admin_listpackage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_package)
    {
        $package =Package::find($id_package);
        $package->delete();
        return redirect('admin_listpackage')->with('success','Procuct has ben delete');
    }
}
