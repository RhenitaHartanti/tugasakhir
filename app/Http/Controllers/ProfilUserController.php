<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Payment;
use App\Package;
use Auth;
use Hash;
use Alert;

class ProfilUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data =User::find(auth()->user()->id);
       $orders=Order::with('package','user')
       ->where('id_user',auth()->user()->id)
       ->where('payment_status', '=','paid off')
       ->where('date_finish','<', date('Y-m-d'))->get();
       return view('landingpage_profil',compact('data','orders'));
    }
    //wes dijajal

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->except(['_token']));
             return redirect('landingpage_profil');  
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
        $landingpage_profil = User::find($id);
        $landingpage_profil->name = $request->name;
        $landingpage_profil->username = $request->username;
        $landingpage_profil->email = $request->email;
        $landingpage_profil->nohp = $request->nohp;
        $landingpage_profil->save();
        Alert::success('your profile is success to update', 'Success');
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
        //
    }
    public function changePassword(Request $request,$id)
    {
        $ubahPassCustomer=User::find($id);
        // return $ubahPassCustomer;
        if (Hash::check($request->passLama, $ubahPassCustomer->password)){
            if ($request->passBaru == $request->confirmPass){
             $ubahPassCustomer->password = bcrypt($request->confirmPass);
                $ubahPassCustomer->save();
            Alert::success('password has changed','Success');
            return redirect('landingpage_profil');
            }
          }
        Alert::error('password not changed','Sorry');
          return back(); 
    }
}