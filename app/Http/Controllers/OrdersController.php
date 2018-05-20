<?php

namespace App\Http\Controllers;
use App\Order;
use App\Package;
use App\Asset;
// use App\Admin;
// use App\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $admin=Admin::where('level','!=' , 'customer')->get();
        $orders=Order::with('package','user')->where('order_status', 'waiting')->orderBy('updated_at','desc')->get();
        
        $total_user = \App\User::count();
        $total_asset = \App\Asset::count();
        $total_package =\App\Package::count();

         $booking=Order::with('package','user','payment')->where('order_status', 'accept')->get();
        $event = $booking->map(function($row){
            $starttime= \Carbon\Carbon::parse($row->date_using.' '.$row->time_using);
            $endtime= \Carbon\Carbon::parse($row->date_using.' '.$row->time_finish);
            return \Calendar::event($row->package->name_package.' '.$row->user->username,false,$starttime,$endtime);
        });
        $calendar = \Calendar::addEvents($event) //add an array with addEvents
            ->setOptions([ //set fullcalendar options
                'firstDay' => 1
            ]);
        return view('admin_dashboard',compact('orders','total_user','total_asset','total_package','booking','calendar'));
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
        $request['id_user']=auth()->user()->id;
        
        $package=Package::find($request->id_package);
            if($request->total_guests>0)
            {
                $request['total_payment']=$package->price + ($request->total_guests*100000);
            }
            else{
                $request['total_payment']=$package->price;
            }
            //return $request->all();
         Order::create($request->except(['_token']));
         
             return redirect('landingpage_setting');    
            }
            //sync: menghubungkan many to many
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
