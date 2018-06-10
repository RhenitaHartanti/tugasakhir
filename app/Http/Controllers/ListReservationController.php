<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;


class ListReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
     $orders=Order::with('package','user','payment')->where('order_status', 'accept')->whereDate('date_using','>',\Carbon\Carbon::now()->toDateString())->orderBy('updated_at','desc')->get();      
      return view('admin_listreservation',compact('orders'));
    }
        // bisa pake or where gt atau pake where in bedanya ?
        // klo pake or where gitu ya artinya dimana order statusnya di acc atau order statusnya di reject
        // klo pake where in itu dimana yg order statusnya ada di dalam sebuah list
        // misal whereIn('order_status',['reject','accept'])
        // ya ntar yg muncul yg ada di dalem list itu, selain itu ga di tampilin
        // sama aja sih kaya or where
        // wwkwkwkwk okke okke shapp
        // dd($orders[2]->payment);
    // $orders=Order::join('packages','packages.id','=','orders.id_package')
        // ->where('order_status', 'accept')->get();
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
        $admin_listreservation=Order::find($id);
        $admin_listreservation->user->name = $request->name;
        $admin_listreservation->package->name_package = $request->name_package;
        $admin_listreservation->date_using = $request->date_using;        
        $admin_listreservation->date_finish = $request->date_finish;
        $admin_listreservation->theme = $request->theme;
        $admin_listreservation->place = $request->place;
        $admin_listreservation->total_guests = $request->total_guests;
        $admin_listreservation->greeting = $request->greeting;
        $admin_listreservation->note = $request->note;
        $admin_listreservation->price = $request->price;
        $admin_listreservation->total_payment = $request->total_payment;
        $admin_listreservation->save();
        return redirect('admin_listreservation');
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
