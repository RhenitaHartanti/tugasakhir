<?php

namespace App\Http\Controllers;
use App\Package;
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
        // $package = $this->validate(request(), [
        //     'name_package' => 'required|max:50',
        //     'quota' => 'required|numeric|max:5',
        //     'details' => 'required|max:50',
        //     'price' => 'required|numeric|max:5',
        // ]);

        Package::create($request->except(['_token']));
             return redirect('admin_listpackage');    

        // Package::create($package);
        // return back()->with('success', 'Data paket berhasil didimpan');
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
        $admin_listpackage = Package ::find($id);
        $admin_listpackage->name_package = $request->name_package;
        $admin_listpackage->details = $request->details;
        $admin_listpackage->price = $request->price;
        $admin_listpackage->kuota = $request->kuota;
        $admin_listpackage->save();
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
        return redirect('admin_listpackage')->with('success','Procuct has ben delete');
    }
}
