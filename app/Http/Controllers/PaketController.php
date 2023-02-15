<?php

namespace App\Http\Controllers;

use App\Models\paket;
use App\Http\Requests\StorepaketRequest;
use App\Http\Requests\UpdatepaketRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cari = $request->cari;
        $datas =  paket::where('name','like',"%".$cari."%")->get();
        return view('paket.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('paket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepaketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $model = new paket;
      
        $model->image = $request->image;
        $model->name = $request->name;
        $model->harga = $request->harga;
        $model->status = $request->status;
        $model->jenis = $request->jenis;
        $model->deskripsi = $request->deskripsi;                
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/paket';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $model['image'] = "$profileImage";
        }


        $validasi = Validator::make($data, [
            'name' => 'required|max:255|unique:pakets',           
            'harga' => 'required|max:15',
            'status' => 'required|max:15',          
            'jenis' => 'required',            
            'deskripsi' => 'required|max:255',

        ]);
        if ($validasi->fails()) {
            return redirect()->route('paket.create')->withInput()->withErrors($validasi);
        }
       
        $model->save();

        
        return redirect('/paket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function show(paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas =  paket::findOrFail($id);
        
        return view('paket.ubah',compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepaketRequest  $request
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $model = paket::findOrFail($id);              
        $model->name = $request->name;
        $model->harga = $request->harga;
        $model->status = $request->status;
        $model->jenis = $request->jenis;
        $model->deskripsi = $request->deskripsi;                
        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/paket';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $model['image'] = "$profileImage";
        }
        $validasi = Validator::make($data, [
            'name' => 'required|max:255|',           
            'harga' => 'required|max:15',
            'status' => 'required|max:15',          
            'jenis' => 'required',            
            'deskripsi' => 'required|max:255',

        ]);
        if ($validasi->fails()) {
            return redirect()->route('paket.edit',$id)->withInput()->withErrors($validasi);
        }
       
        $model->save();

        
        return redirect('/paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\paket  $paket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $hapus = paket::find($id);
        $hapus->delete();
        // toastr()->info('Berhasil di hapus!', 'Sukses');
        return redirect('paket');
    }
}
