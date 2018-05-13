<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Order;
use App\Payment;
use Illuminate\Support\Facades\DB;
use Hash;
use Mail;
use App\User; 
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

// protected $client;

//     public function __construct()
//     {
//         $client = new Google_Client();
//         $client->setAuthConfig('client_secret.json');
//         $client->addScope(Google_Service_Calendar::CALENDAR);

//         $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
//         $client->setHttpClient($guzzleClient);
//         $this->client = $client;
//     }
    public function index()
    {
       $admin=Admin::where('level','!=' , 'customer')->get();
        return view('admin_profil',compact('admin'));
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
        $admin_profil = User::find($id);
        $admin_profil->name = $request->name;
        $admin_profil->username = $request->username;
        $admin_profil->email = $request->email;
        $admin_profil->nohp = $request->nohp;
        $admin_profil->save();
        return redirect('admin_profil');
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
    public function status(Request $request,$id)
    {

        $status=Order::find($id); 
        $status->order_status = $request->order_status;
        /*dd($status);*/
        if($request->order_status=='accept'){
         do{ $random_str=$this->random_str(6);
            $booking_code=Order::where('booking_code',$random_str)->count();
         }
            while($booking_code!=0);
            $status->booking_code=$random_str;
        }

        $status->save();
    if($request->order_status=='accept'){
        $user=User::find($status->id_user);
        Mail::to($user->email)->send(new \App\Mail\SendMail($status));
    }
        return redirect('admin_listreservation');
    }

    public function statusbayar(Request $request,$id)
    {

        $statusbayar=Order::find($id); 
        $statusbayar->payment_status = $request->payment_status;
        /*dd($status);*/
        if($request->payment_status=='paid off'){
        $statusbayar->save();
    }
        return redirect('admin_listreservation');
    }

    public function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
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
        // return $ubahPassAdmin;
        if (Hash::check($request->passLama, $ubahPassAdmin->password)){
            if ($request->passBaru == $request->confirmPass){
             $ubahPassAdmin->password = bcrypt($request->confirmPass);
                $ubahPassAdmin->save();
                return back()
                ->with('status','Password Has Change');
            }
            else
            {
                return back()
                ->with('gagal', 'Password Not Fit');
            }
        }
        else{
            return back()
            ->with('gagal', 'Password Not Fit');
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
   public function accBookingCode(Request $request,$id)
    {
        $payment=Payment::find($id);
        if($payment->booking_code!=$request->booking_code)
            {
                return redirect('admin_listreservation')->withErrors(['Booking code tidak cocok']);
            }
        $payment->update(['payment_status'=>'paid off']);
        Order::find($payment->id_order)->update(['payment_status'=>'paid off']);
        $statusPayment = Order::query()->find($id);
          // session_start();
          //   if (isset($_SESSION['access_token']) && $_SESSION['access_token'] && $_SESSION['access_token']['created'] + $_SESSION['access_token']['expires_in'] > Carbon::now()->timestamp) {
          //       $this->client->setAccessToken($_SESSION['access_token']);
          //       $service = new Google_Service_Calendar($this->client);
          //       $calendarId = 'primary';
          //       $event = new Google_Service_Calendar_Event([
          //           'summary' => $statusPayment->id_package,
          //           'location' => $statusPayment->place,
          //           /*'start' => ['dateTime' => Carbon::parse(($request->start_date), 'Asia/Jakarta')->toRfc3339String()],
          //           'end' => ['dateTime' => Carbon::parse(($request->end_date), 'Asia/Jakarta')->toRfc3339String()],*/
          //           'start' => array(
          //               'date' => $statusPayment->date_using,
          //               'dateTime' => Carbon::parse($statusPayment->time_using)->toRfc3339String(),
          //               'timeZone' => 'Asia/Jakarta',
          //           ),
          //           'reminders' => array(
          //               'useDefault' => FALSE,
          //               'overrides' => array(
          //                   array('method' => 'email', 'minutes' => 60),
          //                   array('method' => 'popup', 'minutes' => 60),
          //                   array('method' => 'email', 'minutes' => 24 * 60),
          //                   array('method' => 'popup', 'minutes' => 24 * 60),
          //               ),
          //           ),
          //       ]);

          //       $optParams = Array(
          //           'sendNotifications' => true,
          //       );

          //       $results = $service->events->insert($calendarId, $event, $optParams);
          //   } else {
          //       return redirect()->route('oauthCallback');
          //   }
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