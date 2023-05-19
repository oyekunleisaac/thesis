<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/bootstrap5/css/bootstrap.min.css">
    <script src="/assets/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Nunito:400,700' rel='stylesheet'>

</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{url('home')}}">E-LEARN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home">HOME</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#discover">LIBRARY</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('library')}}">MY LIBRARY</a>
                    </li>
                    <li class="nav-item">
                             <a autofocus class="nav-link bg-warning rounded py-1" href="{{route('royalty')}}">
                            ROYALTY
                             </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#contact">CONTACT</a>
                    </li>
                    
                    
                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-current="page" href="#exampleModal">HELP</a>

                   
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, <span id="username" class="">{{Auth::user()->fname}}</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="nav-link dropdown-item" aria-current="page" href="logout">Logout</a>
              
                        </ul>                            
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <section class="container-fluid">
        <div class="container mt-2">
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">HELP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>FAQ</h2>
                    <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                        <ol>
                            <li>How do I open a book</li>
                            <ol><li><b>Answer: </b>Click on the view button</li></ol>
                            <li>How do I contact the admin</li>
                            <ol><li><b>Answer: </b>Click on the contact button, and select your preferred option</li></ol>

                        </ol>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
    <section class="container-fluid">
        <div class="container mt-2">
        <div class="d-flex my-5">
           <b> <h2 class="fw-bold">Royalty Library</h2> </b>
           <input type="text" id="searchbar" onkeyup="search_cat()" class="ms-auto form-control sticky-top"
            placeholder="Search for book"></input>
            </div>            
             <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($view as $view)
            <div class="col">
                    <div class="card">
                    <img class="card-img-top" src="{{asset('files/'.$view->image)}}" alt="{{$view->image}}"/>                                                       
                                                             
                                                
                        <div class="card-body">
                            <h5 class="card-title">{{$view->title}}</h5>
                            <h6 class="" style="color: hsl(218, 81%, 75%);">By <span>{{$view->author}}</span> </h6>
                            <p class="card-text">{{$view->description}}</p>
                            @if ($view->value == '0')
                            <input type="button" value="View" class="btn btn-primary">    
                             @else
                             <a href="https://paystack.com/pay/vvdsqwfoaa"><input type="button" style="color:darkblue"  value="Pay" class="bg-warning btn btn-primary"></a>
                             @endif

                            @if ($view->value == '0')
                             <b><span style="float:right; color:green">Free</span></b>
                             @else
                             <b><span style="float:right; color:green">Value: ₦{{$view->value}}</span></b>
                             @endif
                        </div>
                        <div class="card-footer">
                        <small><a class="nav-link" href="{{url('quiz')}}">Take Quiz</a></small>
                            <!-- <small style="color:blue "class="text-muted bi "> Take Quiz</small> -->
                        </div>
                    </div>
                </div>
                @endforeach   

                
            </div>
        </div>
    </section><br><br>
   
 

    <footer class="container-fluid pb-0" style="background: hsl(218, 81%, 75%);" id="contact">
        <div class="container">
            <h2 class="text-white text-center pt-2">CONTACT US </h2>

            <div class="row py-2">
                <div class="col justify-content-center d-flex ">
                    <a href="mailto:elearninglibraryremote@gmail.com" class=" btn bi bi-envelope fs-2 px-3"></a>
                    <!-- <a href="" class=" btn bi bi-instagram fs-2 px-3"></a> -->
                    <a href="http://twitter.com/elearnlibrary" class=" btn bi bi-twitter fs-2 px-3"></a>
                    <a href="tel:+44 7467 657200" class=" btn bi bi-telephone fs-2 px-3"></a>
                </div>
            </div>
        </div>
    </footer>
    <script src="../assets/js/book.js"></script>

</body>

</html>