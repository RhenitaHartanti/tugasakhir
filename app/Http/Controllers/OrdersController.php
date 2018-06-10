<?php

namespace App\Http\Controllers;
use App\Order;
use App\Package;
use App\Asset;
// use App\Admin;
// use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // Order::where('order_status','accept')->where('payment_status','none')
        // ->whereRaw('? > DATE_FORMAT(date_add(created_at,interval 2 day), "%Y-%m-%d ")',[date("Y-m-d")])->doesntHave('payment')->update(['order_status'=>'reject']);
        //fungsi yang digunakan untuk 
     // $admin=Admin::where('level','!=' , 'customer')->get();
    public function index()
    {       
        Order::whereDate('date_using','<',date('Y-m-d'))
        ->doesntHave('payment')->update(['order_status'=>'expired']);       
            $orders=Order::with('package','user')->where('order_status', 'waiting')
                ->orderBy('created_at','desc')->get();        
            $total_user = \App\User::count();
            $total_asset = \App\Asset::count();
            $total_package = \App\Package::count();
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
    // fungsi yang digunakan untuk menyimpan pesanan paket dari customer yang tipe paketnya custom.
    public function store(Request $request)
    {
        if($request->type){
         $paket=Package::create(['type'=>'custom','name_package'=>$request
          ->name_package,'price'=>0,'kuota'=>0]);
          $paket->assets()->sync($request->id_asset);
           $request['id_package']=$paket->id;
            $request['price']=0;
    }
        $request['id_user']=auth()->user()->id;
         $request['total_payment']=0;
          if(!$request->type){   
           $package=Package::find($request->id_package);
            if($request->total_guests>0)
            {
             $request['total_payment']=$package->price + ($request->total_guests*100000);
            }
            else{
             $request['total_payment']=$package->price;
            }
        }

        $request['date_using'] = Carbon::parse($request->date_using)->format('Y-m-d H:i:s');
        $request['date_finish'] = Carbon::parse($request->date_finish)->format('Y-m-d H:i:s');
        Order::create($request->except(['_token','type','id_asset','order_status']));
         
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
    // fungsi yang digunakan untuk update harga paket custom saja
    public function update(Request $request)
    {
        // return $request->all();
        $order=Order::find($request->id_order);
        $order->total_payment = $request->price;
        $order->price = $request->price;
        $order->save();
        return redirect('admin_dashboard');
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
