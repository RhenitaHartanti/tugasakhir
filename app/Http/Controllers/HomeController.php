<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Package;
use App\Order;
use App\Asset;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
     public function landingpage_package()
    {
        return view('landingpage_package');
    }
    public function landingpage_galeri()
    {
        return view('landingpage_galeri');
    }
    public function landingpage_login()
    {
        return view('landingpage_login');
    }
    public function landingpage_setting()
    {
        return view('landingpage_setting');
    }
     public function landingpage_formpackage($id)
    { 
        $package = Package::find($id);
        // if !auth::check
        return view('landingpage_formpackage',compact('package','id'));
    }
    public function cek_tanggal($tanggal){
        $tanggal = date('Y-m-d H:i:s', strtotime(($tanggal)));
        $cek=Order::where('date_using',$tanggal)->first();
        if ($cek==null){
            return 'true';
        }
        else{
            return 'false';
        }
    }
    public function landingpage_formpackagecustom()
    { 
        $assets = Asset::all();
        // if !auth::check
        return view('landingpage_formpackagecustom',compact('assets'));
    }
     public function landingpage_profil()
    {
        return view('landingpage_profil');
    }
    public function landingpage_tagihan()
    {
        return view('landingpage_tagihan');
    }
    // public function getContact(){
    //     return view('');
    // }
    // public function postContact(){
    //     $this->validate($request,
    //         [
    //             'email' => 'required|email' ,
    //             'subject' => 'min:3',
    //             'message' => 'min:10']);

    //     $data = array(
    //         'email' => $request->email,
    //         'subject' => $request->subject,
    //         'message' => $request->message
    //     );
    //     Mail::send('emails.contact', $data, function($message) use ($data){
    //         $message->from($data['email']);
    //         $message->to(hello@);
    //         $message->subject($data['subject']);
    //     });
    // }
    // public function kirimpesan(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'email' => 'required',
    //         'message' => 'required',
    //     ]);
    

    //         $name = $request['name'];
    //         $email = $request['email'];
    //         $message = $request['message'];
            

    //         Mail::send('auth.emails.messages',[ 'name' =>$name, 'email'=>$email, 'message' => $message], function ($m){
    //             $m->to('rereradinka@gmail.com' , 'user') ->subject('Pesan');
    //         });

    //         $user = User::all();
    //         return view('landingpage_beranda', ['users' => $user]);
    // }

//ADMIN
     public function admin_dashboard()
    {
        return view('admin_dashboard');
    }
     public function admin_listreservation()
    {
        return view('admin_listreservation');
    }
     public function admin_listpackage()
    {
        return view('admin_listpackage');
    }
     public function admin_setting()
    {
        return view('admin_setting');
    }
    public function admin_profil()
    {
        return view('admin_profil');
    }
}
