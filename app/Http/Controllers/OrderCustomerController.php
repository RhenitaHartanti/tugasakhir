<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
use Auth;
use App\Payment;

class OrderCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=Order::where('id_user',Auth::user()->id)->get();
        return view('landingpage_setting',compact('order'));
    }
    public function upload(Request $request){
        $this->validate($request, ['gambar' => 'required|image']);
        $gambar = $request->file('gambar');
        $namaFile = $gambar->getClientOriginalName();
        $request->file('gambar')->move('img/buktitransfer', $namaFile);  
        
      $simpan= new Payment ($request->all());
        $simpan->booking_code = $request->booking_code;
        $simpan->attachment = $namaFile;
        $simpan->id_order = $request->id_order;

      $simpan->save();
      return redirect ('landingpage_setting');
   }
   public function loadFormBayar($id)
   {
    return view ('landingpage_formbayar')
    ->with('id',$id);
   }


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
        //
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
}
