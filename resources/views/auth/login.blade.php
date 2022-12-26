<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/bootstrap5/css/bootstrap.min.css">
    <script src="./assets/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/aos/aos.css">
</head>
@section('content')

<body>
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                     <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                     Mowadola
                        <span style="color: hsl(218, 81%, 75%)"> Osifeso</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    Examining what might be required in a developing country, to enable all inhabitants, 
                    no matter how remote they may be from towns and cities, to have easy access, at affordable rates,
                     to educational materials and associated examinations
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass" data-aos="fade-up">
                        <div class="card-body px-4 py-5 px-md-5"><center><span><b>Login</b></span></center><br><br>
                            <form method="POST" action="{{route('login')}}" class="mySlides">
                            @csrf
                              <!-- Email -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="user-email" class="form-control  @error('email') is-invalid @enderror" />
                                    <label class="form-label" for="form3Example3">Email address</label>
                                    @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                </div>
                            
                                <!-- Password -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="password" class="form-control  @error('password') is-invalid @enderror" />
                                    <label class="form-label" for="form3Example4">Password</label>
                                    @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                </div>
                    
                                <button type="submit" class="btn btn-block mb-4" style="background: hsl(218, 81%, 75%)">
                                    Login
                                </button>
                                <button type="button" class="btn btn-block mb-4 ms-auto" style="background: hsl(218, 81%, 75%)" onclick="currentSlide(2)">
                                    <a href="{{route('register')}}">Sign Up</a>
                                    <i class="bi bi-arrow-right"></i>
                                </button>
                                <div>
                                 @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </div>
                                <!-- <div class="text-center">
                                    <p>or sign up with:</p>
                                    <button type="submit" class="btn btn-block mb-4 bi bi-google" style="background: hsl(218, 81%, 75%)">
                                        Sign in with Google
                                    </button>
                                </div> --><br>
                            </form>
                                                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
    <script src="./assets/aos/aos.js"></script>
    <script src="./assets/js/index.js"></script>
    <!-- <script src="./assets/aos/jquery-3.3.1.min.js"></script>
    <script src="./assets/aos/jquery.magnific-popup.min.js"></script> -->
</body>

</html>
