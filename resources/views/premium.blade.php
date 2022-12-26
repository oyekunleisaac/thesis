<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover</title>
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/bootstrap5/css/bootstrap.min.css">
    <script src="../assets/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Nunito:400,700' rel='stylesheet'>

</head>
@extends('layouts.app')

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="./dashboard.html">E-LEARN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('home')}}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">LIBRARY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#contact">CONTACT</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, <span id="username" class="">{{Auth::user()->fname}}</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            </a>  
                           </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="container-fluid my-2">
        <div class="container mt-2">
            <div class="header align-items-center">
                <h1 class="fw-bold p-2 text-center">AVAILABLE BOOKS</h1>
                <div class="d-flex px-3">
                    <h3>Showing materials for:</h3>
                    <div class="mb-3 px-2">
                        <select class="form-select" id="">
                            <option selected value="Engineering">Engineering</option>
                            <option value="Medical Sciences">Medical Sciences</option>
                            <option value="Natural Sciences">Natural Sciences</option>
                            <option value="Social Sciences">Social Sciences</option>
                            <option value="Management Sciences">Management Sciences</option>
                            <option value="Law">Law</option>
                        </select>
                    </div>
                    <form action="" class="ms-auto">
                        <input type="search" name="" id="" placeholder="Search..." class="form-control">
                    </form>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-4">
                <div class="col">
                    <div class="card">
                        <img src="../assets/img/portfolio-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Intro to Computer Science</h5>
                            <h6 class="" style="color: hsl(218, 81%, 75%);">By <span>Lionel Messi</span> </h6>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content.</p>
                            <input type="button" value="Add to Library" class="btn btn-primary">    
                        </div>
                        <div class="card-footer">
                            <small class="text-muted bi bi-star"> RATING: <span>4.5</span></small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../assets/img/portfolio-2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Family Law</h5>
                            <h6 class="" style="color: hsl(218, 81%, 75%);">By <span>Mark Zukerberg</span> </h6>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content.</p>
                            <input type="button" value="Add to Library" class="btn btn-primary">    
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">RATING: <span>4.5</span></small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../assets/img/portfolio-3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Organic Chemistry</h5>
                            <h6 class="" style="color: hsl(218, 81%, 75%);">By <span>Promise Odusanya</span> </h6>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content.</p>
                            <input type="button" value="Add to Library" class="btn btn-primary">    
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">RATING: <span>4.5</span></small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../assets/img/portfolio-4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Business Management</h5>
                            <h6 class="" style="color: hsl(218, 81%, 75%);">By <span>Isaac Gabriel</span> </h6>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content.</p>
                            <input type="button" value="Add to Library" class="btn btn-primary">    
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">RATING: <span>4.5</span></small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../assets/img/portfolio-4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Business Management</h5>
                            <h6 class="" style="color: hsl(218, 81%, 75%);">By <span>Isaac Gabriel</span> </h6>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content.</p>
                            <input type="button" value="Add to Library" class="btn btn-primary">    
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">RATING: <span>4.5</span></small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../assets/img/portfolio-8.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Business Management</h5>
                            <h6 class="" style="color: hsl(218, 81%, 75%);">By <span>Isaac Gabriel</span> </h6>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content.</p>
                            <input type="button" value="Add to Library" class="btn btn-primary">    
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">RATING: <span>4.5</span></small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../assets/img/portfolio-7.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">French</h5>
                            <h6 class="" style="color: hsl(218, 81%, 75%);">By <span>Isaac Gabriel</span> </h6>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content.</p>
                            <input type="button" value="Add to Library" class="btn btn-primary">    
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">RATING: <span>4.5</span></small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../assets/img/portfolio-6.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Business Management</h5>
                            <h6 class="" style="color: hsl(218, 81%, 75%);">By <span>Isaac Gabriel</span> </h6>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content.</p>
                            <input type="button" value="Add to Library" class="btn btn-primary">    
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">RATING: <span>4.5</span></small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../assets/img/portfolio-2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Business Management</h5>
                            <h6 class="" style="color: hsl(218, 81%, 75%);">By <span>Isaac Gabriel</span> </h6>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content.</p>
                            <input type="button" value="Add to Library" class="btn btn-primary">    
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">RATING: <span>4.5</span></small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="../assets/img/portfolio-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Business Management</h5>
                            <h6 class="" style="color: hsl(218, 81%, 75%);">By <span>Isaac Gabriel</span> </h6>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content.</p>
                            <input type="button" value="Add to Library" class="btn btn-primary">    
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">RATING: <span>4.5</span></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="container-fluid pb-0" style="background: hsl(218, 81%, 75%);" id="contact">
        <div class="container">
            <h2 class="text-white text-center pt-2">CONTACT US </h2>
    
            <div class="row py-2">
                <div class="col justify-content-center d-flex ">
                    <a href="" class=" btn bi bi-envelope fs-2 px-3"></a>
                    <a href="" class=" btn bi bi-instagram fs-2 px-3"></a>
                    <a href="" class=" btn bi bi-twitter fs-2 px-3"></a>
                    <a href="" class=" btn bi bi-telephone fs-2 px-3"></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>