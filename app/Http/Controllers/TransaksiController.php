<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\transaksi;
use Redirect;
use Auth;
use App\Models\paket;
use App\Http\Requests\StoretransaksiRequest;
use PDF;
use App\Http\Requests\UpdatetransaksiRequest;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {
        $data = $request->all();
        do {
            $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $request['kode_invoce'] = substr(str_shuffle($chars), 0, 10);
        } while (transaksi::where('kode_invoce', $request['kode_invoce'])->exists());
        $datas = DB::table('pakets')
        ->where('id', $request->paketid)->where('status', 1)->first();
        $total =  $datas->harga * $request->kilo + 2000;
        if(  $request->bayar >= $total  ){
        $model = new transaksi;
      
        $model->kode_invoce = $request->kode_invoce;
        $model->userid = $request->userid;
        $model->paketid = $request->paketid;
        $model->kilo = $request->kilo;
        $model->tgl = $request->tgl;
        $model->batas_waktu = $request->batas_waktu;
        $bayar =  $datas->harga * $request->kilo + 2000;
        $model->total = $bayar;
        $model->bayar = $request->bayar;
        $model->metode_pembayaran = $request->metode_pembayaran;
        $model->biaya_tambahan = '2000';
        $model->status = 'Belum di selesai';
        $model->kembalian = $bayar - $datas->harga ;


    
       
        $model->save();
        }else{
        

            return Redirect::back()->with('error','Uang yang anda masukan tidak mencukupi!');
        }
        
        return redirect()->route('keranjang', Auth::id())->with('success','Berhasil di tambahkan');
    }
    public function keranjang(Request $request, $id)
    {        
        $cari = $request->cari;
        $datas = transaksi::with(['paket'])->where('kode_invoce','like',"%".$cari."%")->where('status','Belum selesai')->where('userid',  $id)->get();    
        return view('keranjang',compact('datas'));
    }
    public function sudah(Request $request, $id)
    {        
        $cari = $request->cari;
        $datas = transaksi::with(['paket'])->where('kode_invoce','like',"%".$cari."%")->where('userid',  $id)->where('status','Sudah selesai')->get();    
        return view('sudah',compact('datas'));
    }
    public function delete(Request $request,$id){
       
        DB::table('transaksis')
        ->where('id', $id)
      
        ->delete();
     
        return redirect()->route('keranjang', Auth::user()->id);
    }   
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas = transaksi::with(['paket','user'])->where('kode_invoce','like',"%".$cari."%")->orderBy('status')->get();    
        $selesai = transaksi::with(['paket','user'])->where('kode_invoce','like',"%".$cari."%")->where('status',"Sudah selesai")->get();    
        $sum = transaksi::with(['paket','user'])->where('status',"Sudah selesai")->sum('total');
        return view('transaksi.index',compact('datas','selesai','sum'));
    }

    public function ubahadmin(Request $request, $id)
    {
        
        $datas = transaksi::where('id', '=', $id  )->update([
            'status' => $request->status,
        
        ]);
        return Redirect::back()->with('success','berhasil di ubah');
    }
    public function sudahadmin(Request $request)
    {
        $cari = $request->cari;
        $datas = transaksi::with(['paket'])->where('kode_invoce','like',"%".$cari."%")->where('status','Sudah selesai')->get();    
        return view('sudah',compact('datas'));
    }
    public function pdf(){
        $datas = transaksi::with(['paket','user'])->orderBy('status')->get();    
        $selesai = transaksi::with(['paket','user'])->where('status',"Sudah selesai")->get();    
        $sum = transaksi::with(['paket','user'])->where('status',"Sudah selesai")->sum('total');
     
         $pdf = PDF::loadview('transaksi.pdf',compact('datas','selesai','sum'));
         return $pdf->download('laporanpdf.pdf');
        
     }

   
}


