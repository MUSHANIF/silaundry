<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\transaksi;
use Auth;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(Request $request) {
    return view('dashboard',[
            
        'user' => User::where('level','=', 1)->count(),
        'belum' => transaksi::where('status', '=', 'Belum selesai')->count(),
        'sudah' => transaksi::where('status', '=', 'Sudah selesai')->count(),
        'belumuser' => transaksi::where('status', '=', 'Belum selesai')->where('userid' , Auth::id())->count(),
        'sudahuser' => transaksi::where('status', '=', 'Sudah selesai')->where('userid' , Auth::id())->count(),
        // 'motorpake' => motor::where('status', '=', 'Sedang di pakai')->count(),
        // 'jenis' => jnsmotor::where('name', '=', 'matic')->count(),
        // 'keranjang' => cart::where('userid', '=', auth()->user()->id)->where('status',0)->count(),
       
    ]);
}
}
