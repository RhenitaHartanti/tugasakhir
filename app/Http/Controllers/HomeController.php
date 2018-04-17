<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function landingpage_beranda()
    {
        return view('landingpage_beranda');
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
    public function setting()
    {
        return view('setting');
    }
     public function landingpage_formpackage()
    {
        return view('landingpage_formpackage');
    }
     public function landingpage_formpackage2()
    {
        return view('landingpage_formpackage2');
    }





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
    public function admin_listcustomer()
    {
        return view('admin_listcustomer');
    }

}
