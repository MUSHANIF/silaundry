@extends('layouts.backend')
@section('isi')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Data paket baru</h5>
        {{-- <small class="text-muted float-end">Default label</small>    --}}
      </div>
      <div class="card-body">
        <form action="{{ route('paket.store') }}" method="POST"  enctype="multipart/form-data" >
            @csrf
            
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="basic-default-name" name="name" placeholder="Nama paket baru" value="{{ old('name') }}" />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Jenis</label>
            <div class="col-sm-10">
              <select class="form-select" id="exampleFormControlSelect1" name="jenis" aria-label="Default select example">
                  <option value="Kiloan">Kiloan</option>  
                  <option value="Selimut">Selimut</option>
                  <option value="Bed_cover">Bed_cover</option>
                  <option value="Kaos">Kaos</option>
                  <option value="Lain">Lain</option>                                
                </select>
          </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-company">Harga</label>
            <div class="col-sm-10">
              <input
                type="number"
                class="form-control"                
                placeholder="100.000"
                name="harga"
                
                value="{{ old('harga') }}"
              />
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-email">Status</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
              <select class="form-select" id="exampleFormControlSelect1" name="status" aria-label="Default select example">
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak tersedia</option>                                                                                          
                      </select>
                
              </div>
            
            </div>
          </div>
          
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-phone">Image</label>
            <div class="col-sm-10">
              
                <input class="form-control " type="file" id="image" name="image" value="{{ old('image') }}" />
                <img id="preview-image-before-upload" src="" alt="" style="width: 250px" class="mt-3" />
            </div>
            
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-message">Deskripsi</label>
            <div class="col-sm-10">
              <textarea
                id="basic-default-message"
                class="form-control"
                placeholder="paket ini sangat nyaman dan bagus untuk di pakai oleh kalangan anak muda"
                aria-label="Hi, Do you have a moment to talk Joe?"
                aria-describedby="basic-icon-default-message2"
                name="deskripsi"
              >{{ old('deskripsi') }}</textarea>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@endsection