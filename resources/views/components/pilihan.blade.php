

<section class="trending-product section" style="margin-top: 12px; color: black;">
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
            <div class="col-lg-4 col-md-6 col-12">
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
    <div class="modal fade" id="exampleModal"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
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
              <input type="hidden" id="kode_invoce" name="kode_invoce" value="">
              <input type="hidden" id="paketid" name="paketid" value="">
              
               <div class="row">
                <div class="col-md-12 mb-2">
                  <label for="validationDefault04" class="form-label">Kilo</label>
                  <select class="form-select mb-2" name="kilo" id="validationDefault04" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="1">1 KG</option>
                    <option value="2">2 KG</option>
                    <option value="3">3 KG</option>
                    <option value="4">4 KG</option>
                  </select>
                </div>
                <div class="col-md-6 mb-2 mt-2">
                  <label for="validationDefault02" class="form-label">Waktu</label>
                  <input type="date" class="form-control" name="tgl" id="validationDefault02" value="Otto" required>
                </div>
               
                <div class="col-md-6 mb-2 mt-2">
                  <label for="validationDefault03" class="form-label">batas waktu</label>
                  <input type="date" class="form-control" name="batas_waktu" id="validationDefault03" required>
                </div>
              
                <div class="col-md-12 mb-2 mt-2 ">
                  <label for="validationDefault05" class="form-label">bayar</label>
                  <input type="text" class="form-control" name="bayar" placeholder="Rp.20.000" id="validationDefault05" required>
                </div>  
                <div class="col-md-12 mb-2 mt-2">
                  <label for="validationDefault04" class="form-label">Metode pembayaran</label>
                  <select class="form-select" name="metode_pembayaran" id="validationDefault04" required>
                    
                    <option value="cash">cash</option>                                                      
                  </select>
                </div>  
              </div> 
          
              
              
            
          </div>
     
          <div class="modal-footer" >
            <button type="button" class="btn btn-secondary" style="padding: 10px 12px;" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"  style="padding: 10px 12px;">Pesan</button>
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
      <script>
    
        $(document).ready(function(){
               $(document).on('click', '#pesan', function () {
                var userid = $(this).data('userid');
             
             var paketid = $(this).data('paketid');
             
       
             $('#userid').attr('value',userid);
             $('#paketid').attr('value',paketid);
             
           
            
             
          });
        });
      </script>
</section>
