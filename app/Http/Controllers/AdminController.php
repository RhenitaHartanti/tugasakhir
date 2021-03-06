<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Admin;
use App\Order;
use App\Payment;
use Hash;
use Mail;
use App\User; 
use Alert;
// use Carbon\Carbon; 
// use Google_Client;
// use Google_Service_Calendar;
// use Google_Service_Calendar_Event;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $admin=Admin::where('level','!=' , 'customer')->get();
       $orders=Order::with('package','user')
       ->where('payment_status', 'paid off')
       ->whereDate('date_using','>',\Carbon\Carbon::now()->toDateString())->get();
       $total=Order::where('payment_status', 'paid off')
       ->whereDate('date_using','>',\Carbon\Carbon::now()->toDateString())->sum('total_payment');
       return view('admin_profil',compact('admin','orders','total'));
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
        Admin::create($request->except(['_token']));
             return redirect('admin_profil');  
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
    // public function destroy($id)
    // {
    //     $admin =Admin::find($id);
    //     $admin->delete();
    //     return redirect('admin_setting')->with('success','Procuct has ben delete');
    // }
    //fungsi yang digunakan untuk mengubah status dan mengirimkan konfirmasi penerimaan
    // pemesanan serta pengiriman kode booking.
    public function status(Request $request,$id)
    {
        $status=Order::find($id); 
        $status->order_status = $request->order_status;
          if($request->order_status=='accept'){
            do{ $random_str=$this->random_str(6);
              $booking_code=Order::where('booking_code',$random_str)->count();
            }
            while($booking_code!=0);
            $status->booking_code=$random_str;
          }
        $status->save();
        $user=User::find($status->id_user);
        Mail::to($user->email)->send(new \App\Mail\SendMail($status));
          if($status->order_status=='accept'){          
            return redirect('admin_listreservation');
          }
          return redirect('admin_rejectorder');
    }

    public function statusbayar(Request $request,$id)
    {

        $statusbayar=Order::find($id); 
        $statusbayar->payment_status = $request->payment_status;
        if($request->payment_status=='paid off'){
        $statusbayar->save();
    }
        return redirect('admin_listreservation');
    }
  //
    public function random_str($length,
        $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
  {
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
  }
    public function changePassword(Request $request,$id)
    {
      $ubahPassAdmin=User::find($id);
       if (Hash::check($request->passLama, $ubahPassAdmin->password)){
         if ($request->passBaru == $request->confirmPass){
           $ubahPassAdmin->password = bcrypt($request->confirmPass);
             $ubahPassAdmin->save();
              return back();
            }
        }            
    }
  //   public function changePassword()
  // {
  //   $this->validate(request(), [
  //       'current_password' => 'required|current_password',
  //       'new_password' => 'required|string|min:6|confirmed',
  //   ]);

  //   request()->user()->fill([
  //       'password' => Hash::make(request()->input('new_password'))
  //   ])->save();
  //   request()->session()->flash('success', 'Password changed!');

  //   return redirect()->route('password.change');
  // }
    public function loadFormBayar($id)
   {
        
        $payments=Payment::where('id_order','=',$id)->first();        
        
        return view('admin_konfirmasipembayaran')
        ->with('payments',$payments)
        ->with('id',$id);  
   }
   //fungsi yang digunakan untuk melakukan pengecekan 
   public function accBookingCode(Request $request,$id)
    {
        $payment=Payment::find($id);
        $statusPayment = Order::find($payment->id_order);
        if($statusPayment->booking_code!=$request->booking_code)
            {
                return redirect('admin_listreservation');
                // ->withErrors(['Booking code is not suitable']);
            }
        $payment->update(['payment_status'=>'paid off']);
        $statusPayment->update(['payment_status'=>'paid off']);
        $user=User::find($statusPayment->id_user);
        Mail::to($user->email)->send(new \App\Mail\PaymentMail($statusPayment));
        $package = \App\Package::find($statusPayment->id_package);
        if($package->assets->count()>0){
             $statusPayment->assets()->sync($package->assets);
         }
        
        return redirect('admin_listreservation')->with('Booking Code cocok');
    }

    public function updateStatusPayment(Request $request,$id)
    {
        $statusPayment = Order::query()->find($id);
        $statusPayment->payment_status = $request->payment_status;
        $statusPayment->save();
        if ($statusPayment->payment_status == 'paid off'){
        }
        return redirect('admin_listreservation');
    }
}