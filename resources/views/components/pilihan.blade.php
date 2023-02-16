

<section class="trending-product section" style="margin-top: 12px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Paket laundry</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
         @foreach ($datas as $key )                      
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <img src="/assets/images/paket/{{ $key->image }}" alt="#">
                        <div class="button">
                            <a id="pesan"  data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-userid="{{ Auth::id() }}"
                            data-paketid="{{ $key->id }}"                                                        
                            class="btn"><i class="lni lni-cart"></i>
                            Add to Cart 
                          </a>
                           
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">Tersedia</span>
                        <h4 class="title">
                            <a href="product-grids.html">{{ $key->name }} ({{ $key->jenis }} )</a>
                        </h4>
                        <ul class="review">
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><span>5.0 Review(s)</span></li>
                        </ul>
                        <div class="price">
                            <span>Rp.  {{ $key->harga }}</span>
                        </div>
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
            @endforeach
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              @auth
                  
              
              <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
          
             <form action="{{ route('tambah',Auth::user()->id) }}" method="POST" >
              @csrf
              <input type="hidden" id="userid" name="userid" value="">
              
              <input type="hidden" id="paketid" name="paketid" value="">
              <div class="row mb-3">
                <div class="col-md-12 mt-2">
                <label for="exampleFormControlInput1" class="form-label">Tanggal</label>                
                  <input type="date-local" class="form-control" id="basic-default-name" name="tgl" value="{{ $today }}"/>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12 mt-2">
                <label for="exampleFormControlInput1" class="form-label">Batas Waktu</label>
                
                  <input type="date" class="form-control" id="basic-default-name" name="batas_waktu" value="" />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12 mt-2">
                <label for="exampleFormControlInput1" class="form-label">Kilo</label>
                
                <select class="form-select" id="exampleFormControlSelect1" name="kilo" aria-label="Default select example">                    
                  <option id="1" value="1">1</option>                                                                                      
                  <option id="1" value="2">2</option> 
                  <option id="1" value="3">3</option> 
                  <option id="1" value="4">4</option> 
                </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12 mt-2">
                <label for="exampleFormControlInput1" class="form-label">Metode pembayaran</label>
                
                <select class="form-select" id="exampleFormControlSelect1" name="metode_pembayaran" aria-label="Default select example">                    
                  <option id="1" value="cash">Cash</option>                                                                                      
                </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-12 mt-2">
                <label for="exampleFormControlInput1" class="form-label">Masukan uang nya</label>                
                <input type="number" class="form-control" id="basic-default-name" name="bayar" value="" />
                </div>
              </div>
            
              <div class="row mb-3">
                
                <div class="col-md-12 mt-2">
                  <label for="exampleFormControlInput1" class="form-label">Apakah anda ingin menjadi member?</label>
                  <select class="form-select" id="exampleFormControlSelect1" name="status" aria-label="Default select example">
                    
                       <option id="1" value="member">Ya</option>
                       <option id="2" value="tidak member">Tidak dulu</option>
                    

                      
                     </select>
                </div>
              </div>
                
          
              
              
            
          </div>
     
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Pesan</button>
          </form>
          @else
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
          
            <h2>Silahkan login atau register terlebih dahulu!</h2>
          

               
            @endauth
            </div>
          </div>
        </div>
      </div>
</section>
