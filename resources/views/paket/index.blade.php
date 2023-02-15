@extends('layouts.backend')
@section('coba')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@endsection
@section('search')


@endsection
@section("button")
<a href="{{ route('paket.create') }}" class="btn btn-primary text-end mb-4">Tambah</a>
@endsection
@section('title')
<h1 class="mb-0 fw-bold">List paket</h1> 
@endsection
@section('isi')
<div class="card">
    <h5 class="card-header">Data paket</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-borderless text-center">
        <thead>
          <tr>
            <th>Images </th>
            <th>Name </th>
            <th>Harga</th>
            <th>Status</th>        
            <th>Jenis</th>
            <th>Deskripsi</th>            
            <th>Action</th>
          </tr>
        </thead>

      
            
        
        <tbody id="disini">
          <div class="belom">  
            @foreach ($datas as $key )        
          <tr>
            <td id="td"><img src="/assets/images/paket/{{ $key->image }}" style="height: 100px; width: 150px" /></td>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $key->name }}</strong></td>
            <td>{{ $key->harga }}</td>
            <td>{{ $key->status }}</td>           
            <td>{{ $key->jenis }}</td>            
            <td>{{ $key->deskripsi }}</td>
            
            <td>
              
                
                 
                  <a href="{{ route('paket.edit',$key->id) }}" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a>
            
              <form action="{{ url('paket/'.$key->id) }}" method="POST" >
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
