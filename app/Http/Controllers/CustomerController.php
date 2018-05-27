<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // {{Auth::users()->name}}
    public function index()
    {
        $customer=User::where('level','!=' , 'admin')->get();
        return view('admin_listcustomer',compact('customer'));
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
    public function store(Request $request, $id)
    {
        
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
        $landingpage_profil = User ::find($id);
        $landingpage_profil->name = $request->name;
        $landingpage_profil->username = $request->username;
        $landingpage_profil->email = $request->email;
        $landingpage_profil->password = $request->password;
        $landingpage_profil->nohp = $request->nohp;
        $landingpage_profil->created_at = $request->created_at;
        $landingpage_profil->updated_at = $request->updated_at;
        $landingpage_profil->save();
        return redirect('landingpage_profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $customer =Customer::find($id);
        // $customer->delete();
        // return redirect('setting')->with('success','Procuct has ben delete');
    }
}
