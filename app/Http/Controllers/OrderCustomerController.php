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
    // fungsi yang diunakan untuk menampilkan pesanan dari user yang sedang masuk, dimana yanggal pesannya lebih atau sama dengan hari ini
    public function index()
    {
     $order=Order::where('id_user',Auth::user()->id)->
      where('date_using','>=', date('Y-m-d'))
       ->orderBy('updated_at','desc')->get();
         return view('landingpage_setting',compact('order'));
    }
    //fungsi yang digunakan untuk melakukan pengunggahan gambar bukti transaksi
    public function upload(Request $request){
        $this->validate($request, ['gambar' => 'required|image']);
        $gambar = $request->file('gambar');
        $namaFile = $gambar->getClientOriginalName();
        $request->file('gambar')->move('img/buktitransfer', $namaFile);  
       
        $simpan = Payment::updateOrCreate(['id_order'=>$request->id_order],['booking_code'=>$request->booking_code,'attachment'=>$namaFile]);
        // jd yg ini itu buat update data klo udah ada, klo blm ada langsung create baru
        // trus yg ini..parameter buat nyari berdasarkan apaan.. klo case nya sekarang itu kan berdasarkan id ordernya, jd di cari dlu id ordernya ada enggak di tabel payment.. klo ada ya cm update yg di array ke 2 itu, klo ga ada ya langsung create dgn parameter di array ke 2 itu
        // paham ga? wkwkw
        // sek, yang aku blok ga paham nih ya...ya
        // jd itu sama aja kmu kayak yg bawah ini, misal nih td kan nyari berdasarkan id order
        // nah di tabel payment id order nya blm ada, ya dia create data baru dgn id order yg dr request(ini id order yang ada di tabel orders kan brati ?iya shappp paham paham ojo di hapus iki mas wkwkwkwkwkkw) berserta parameter lainnya
        // langusng di coba ae wkwk, drp bingung
      // $simpan= new Payment ($request->all());
      //   $simpan->booking_code = $request->booking_code;
      //   $simpan->attachment = $namaFile;
      //   $simpan->id_order = $request->id_order;
      // $simpan->save();
      return redirect ('landingpage_setting');
   }

   public function loadFormBayar($id)
   {

    $order=Order::find($id);
    return view ('landingpage_formbayar',compact('order'))->with('id',$id);
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
        $landingpage_setting = User::find($id);
        $landingpage_setting->name = $request->name;
        $landingpage_setting->username = $request->username;
        $landingpage_setting->email = $request->email;
        $landingpage_setting->nohp = $request->nohp;
        $landingpage_setting->save();
        return redirect('landingpage_setting');
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

    // jd yg ini itu buat update data klo udah ada, klo blm ada langsung create baru
        // trus yg ini..parameter buat nyari berdasarkan apaan.. klo case nya sekarang itu kan berdasarkan id ordernya, jd di cari dlu id ordernya ada enggak di tabel payment.. klo ada ya cm update yg di array ke 2 itu, klo ga ada ya langsung create dgn parameter di array ke 2 itu
        // paham ga? wkwkw
        // sek, yang aku blok ga paham nih ya...ya
        // jd itu sama aja kmu kayak yg bawah ini, misal nih td kan nyari berdasarkan id order
        // nah di tabel payment id order nya blm ada, ya dia create data baru dgn id order yg dr request(ini id order yang ada di tabel orders kan brati ?iya shappp paham paham ojo di hapus iki mas wkwkwkwkwkkw) berserta parameter lainnya
        // langusng di coba ae wkwk, drp bingung

      // $simpan= new Payment ($request->all());
      //   $simpan->booking_code = $request->booking_code;
      //   $simpan->attachment = $namaFile;
      //   $simpan->id_order = $request->id_order;

      // $simpan->save();
