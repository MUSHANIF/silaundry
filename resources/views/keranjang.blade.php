@extends('layouts.backend')
@section('search')
<div class="page-heading">
    <div class="col-md-12 mb-1">
        <form action="{{ route('keranjang',Auth::id()) }}" method="GET">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i
                    class="bi bi-search"></i></span>
                    
                    <input type="text" name="cari" class="form-control" placeholder="Cari kode invoces anda"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit"
                id="button-addon2">Search</button>
              
        </div>
    </form>
    </div>
    
</div>
@endsection
@section('isi')
<div class="card">
    <h5 class="card-header"><div class="alert alert-warning text-center">Laundry anda yang belum selesai</div></h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-borderless text-center">
        <thead>
          <tr>
            <th>Kode invoce </th>
            <th>Nama paket</th>
            <th>Tanggal </th>
            <th>Batas waktu</th>
            <th>Kilo</th>        
            <th>Total</th>
            <th>Kembalian</th>            
            <th>Action</th>
          </tr>
        </thead>

      
            
        
        <tbody id="disini">
          <div class="belom">  
            @foreach ($datas as $key )        
          <tr>
            
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $key->kode_invoce }}</strong></td>
            <td>{{ $key->paket->name }}</td>
            <td>{{ $key->tgl }}</td>
            <td>{{ $key->batas_waktu }}</td>           
            <td>{{ $key->kilo }} Kg</td>            
            <td>Rp. {{ number_format($key->total, 0, '', '.') }} (+Rp 2000)</td>
            <td>Rp. {{ number_format($key->kembalian, 0, '', '.') }}</td>
            
            <td>
              
                
                 
                  {{-- <a href="{{ route('paket.edit',$key->id) }}" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a> --}}
            
              <form action="{{ url('keranjang/'.$key->id) }}" method="POST" >
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                
            </form>
                
             
                
                
                  
                
              
            </td>
          </tr>
        </div>
        </tbody>
     
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Detail paket {{  $key->name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="text-center mb-4">
              <a href="" data-bs-toggle="modal" id="paketDetails"  data-bs-target="#exampleModal1"><img src="" id="img" style="height: 100px; width: 150px" /></a>
            </div>
            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                 <div class="modal-content">
                    <div class="modal-header">
                       <h5 class="modal-title text-center justify-content-center" id="exampleModalLabel">Detail Foto</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <img src="" id="img2" style="height: 100%; width: 100%" />
                    </div>
                 </div>
              </div>
           </div>
           <div id="paketDetails" class="modal-body" style="margin-bottom: 12px">
            <div>
              <b>Nama paket: </b>
              <p><span id="name"></span></p>
             </div>
             <div>
               <b>Jenis paket: </b>
               <p><span id="jenis"></span></p>
              </div>
              <div>
                <b>Harga: </b>
                <p><span id="harga"></span></p>
               </div>
              <div>
               <b>Plat paket: </b>
               <p><span id="plat"></span></p>
              </div>
              <div>
                <div>
                  <b>Warna: </b>
                  <p><span id="warna"></span></p>
                 </div>
                 <div>
                <b>Status: </b>
                <p><span id="status"></span></p>
               </div>
              <div>
               <b>Deskripsi: </b>
               <p><span id="des"></span></p>
          </div>
          </div>
        </div>
        @endforeach
      </table>
    </div>
  </div>
     
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  
 



    <script>
        $(document).ready(function(){
             $(document).on('click', '#detail', function () {
              var img = $(this).data('image');
           var name = $(this).data('name');
           var jenis = $(this).data('jenis');
           var harga = $(this).data('harga');
           var plat = $(this).data('plat');
           var status = $(this).data('status');
           var des = $(this).data('des');
           var warna = $(this).data('warna');
           $('#img').attr('src',img);
           $('#img2').attr('src',img);
           $('#name').text(name);
           $('#jenis').text(jenis);
           $('#harga').text(harga);
           $('#plat').text(plat);
           $('#status').text(status);
           $('#des').text(des);
           $('#warna').text(warna);
          
           
        });
      });
    </script>
     
  
    <script type="text/javascript">
        var route = "{{ url('mtr') }}";
        $('#search').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
    
    <script>
      $(document).ready(function () {
        $('#search').on('keyup', function(){
            var value = $(this).val();
        
            
             
              $.ajax({
                type: "GET",
                url: "/paket",
                data: {'search':value},
                dataType: "json",
                beforeSend: function() {
                    $('.belom');.show();
                } 
                success: function (data) {
                  $('#disini').text(data);
                  
                }
                
            });
            
           
        });
    });
    </script>

@endsection
