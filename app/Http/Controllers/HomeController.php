<?php

namespace App\Http\Controllers;
use App\Models\kategori;
use App\Models\paket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(){
        $datas = paket::all();
        
     
        return view('welcome',compact('datas'));
    }
}
