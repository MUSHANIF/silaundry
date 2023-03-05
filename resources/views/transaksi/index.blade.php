@extends('layouts.backend')
@section('search')
<div class="page-heading">
    <div class="col-md-12 mb-1">
        <form action="/transaksi" method="GET">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i
                    class="bi bi-search"></i></span>
                    
                    <input type="text" name="cari" value="{{ old('cari') }}" class="form-control" placeholder="Cari kode invoces anda"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit"
                id="button-addon2">Search</button>
              
        </div>
    </form>
    </div>
    
</div>
@endsection
@section('isi')

<section class="section">
    <div class="card">
        <div class="card-header">
            Daftar cucian yang belum & sudah selesai
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        
                        <th>Kode invoces</th>
                        
                        <th>Nama user</th>
                        <th>tgl</th>
                        <th>Batas waktu</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($datas as $key )                                
                <tbody>
                    <tr>
                        <td>{{ $key->kode_invoce }}</td>
                        
                        <td>{{ $key->user->name }}</td>
                        <td>{{ $key->tgl }}</td>
                        <td>{{ $key->batas_waktu }}</td>
                        <td>Rp.{{ $key->total }}</td>
                        
                        <td>
                            @if ($key->status == 'Sudah selesai')
                            <span class="badge bg-success">Sudah selesai</span>
                            @else
                            <span class="badge bg-danger">Belum selesai</span>
                            @endif
                            
                        </td>
                        <td>
              
                
                 
                           
                      
                        <form action="{{ url('ubahadmin/'.$key->id) }}" method="POST" >
                          @csrf
                          <input type="hidden" name="status" value="Sudah selesai">
                          <button type="submit" class="btn btn-success">Sudah selesai</button>
                          
                      </form>
                          
                       
                          
                          
                            
                          
                        
                      </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

</section>
@if ($selesai)
    

<section class="section">
    <div class="card">
        <div class="card-header">
            Daftar cucian sudah selesai
            
        </div>

        

        <div class="card-body">
            <a href="/laporanpdf" class="btn btn-danger mb-3">Download Pdf</a>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Kode invoces</th>
                        <th>Nama paket</th>
                        <th>Nama user</th>
                        <th>tgl</th>
                        <th>Batas waktu</th>
                        <th>Total</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                @foreach ($selesai as $key )                                
                <tbody>
                    <tr>
                        <td>{{ $key->kode_invoce }}</td>
                        <td>{{ $key->paket->name }}</td>
                        <td>{{ $key->user->name }}</td>
                        <td>{{ $key->tgl }}</td>
                        <td>{{ $key->batas_waktu }}</td>
                        <td>Rp.{{ $key->total }}</td>
                        
                        <td>
                            @if ($key->status == 'Sudah selesai')
                            <span class="badge bg-success">Sudah selesai</span>
                            @else
                            <span class="badge bg-danger">Belum selesai</span>
                            @endif
                            
                        </td>
                        
                          
                          
                            
                          
                        
                      
                    </tr>
                    <tr>
                        <th colspan="20" class="text-right" >Total Keseluruhan biaya pemasukan: Rp. {{number_format($sum, 0, '', '.') }}</th>
                       </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

</section>



@endif
<script src="assets/js/bootstrap.js"></script>
{{-- <script src="assets/js/app.js"></script> --}}

<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="assets/js/pages/simple-datatables.js"></script>
<script src="assets/js/pages/datatables.js"></script>
@endsection