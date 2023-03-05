
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register | Sitravel</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://cdn.statically.io/gh/devanka761/notipin/v1.24.49/all.js"></script>
  </head>
  <body>
    <main>
      <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="pt-4 pb-2">
                      <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                      <p class="text-center small">Enter your personal details to create account</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation">
                      @csrf
                      <div class="col-12">
                        <label for="yourName" class="form-label">Your Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="yourName" required>
                        <div class="invalid-feedback">Please, enter your name!</div>
                      </div>
  
                      <div class="col-12">
                        <label for="yourEmail" class="form-label">Your Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="yourEmail" required>
                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                      </div>                 
                      <div class="col-12">
                        <label for="yourPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                      <div class="col-12">
                          <label for="yourPassword" class="form-label">Confirm Password</label>
                          <input type="password" name="password_confirmation" class="form-control" id="yourPassword" required>
                          <div class="invalid-feedback">Please enter your Confirm password!</div>
                        </div>
    

                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox"  id="acceptTerms" required />
                          <label class="form-check-label" for="acceptTerms">Saya setuju dengan segala <a href="#" style="text-decoration: none">ketentuan dan aturan</a></label>
                          <div class="invalid-feedback">Kamu harus menceklis nya!.</div>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                      </div>
                      <div class="col-12">
                        <p class="small mb-0">Sudah ada akun? <a href="{{ route('login') }}">Log in</a></p>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    
    <script>
      @foreach($errors->all() as $error)
      Notipin.Alert({
          msg: "{{ $error }}", 
          yes: "OKE",
          
          type: "NORMAL",
          mode: "DARK",
          })
          
      @endforeach
      
  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
