<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Order;

class ListReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        // $orders=Order::join('packages','packages.id','=','orders.id_package')
        // ->where('order_status', 'accept')->get();
        $orders=Order::with('package','user','payment')->where('order_status', 'accept')->orWhere('order_status','reject')->orderBy('updated_at','desc')->get();
        // bisa pake or where gt atau pake where in bedanya ?
        // klo pake or where gitu ya artinya dimana order statusnya di acc atau order statusnya di reject
        // klo pake where in itu dimana yg order statusnya ada di dalam sebuah list
        // misal whereIn('order_status',['reject','accept'])
        // ya ntar yg muncul yg ada di dalem list itu, selain itu ga di tampilin
        // sama aja sih kaya or where
        // wwkwkwkwk okke okke shapp
        // dd($orders[2]->payment);
        return view('admin_listreservation',compact('orders'));
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
        //
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
    public function history()
    {        
        
    }
    
}
