<?php

namespace App\Http\Controllers;
use App\Order;
use App\Package;
use App\User;
use App\Payment;

use Illuminate\Http\Request;

class LandingBerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('landingpage_beranda',compact('bosoking','calendar'));
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
}

