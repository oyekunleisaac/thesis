<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Dashboard</title>
    <link rel="stylesheet" href="../assets/css/author.css">
    <link rel="stylesheet" href="../assets/bootstrap5/css/bootstrap.min.css">
    <script src="../assets/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/aos/aos.css">
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">E-LEARN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">HOME</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#contact">CONTACT</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome, <span id="username" class="">{{Auth::user()->fname}}</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="nav-link dropdown-item" aria-current="page" href="../logout">Logout</a>
              
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Add teacher Modal -->
    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>Fill in the Book Details</h2>
                    <form action="/admin/dashboard" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="Book Title" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="author" class="form-control" placeholder="Book Author" required>
                        </div>
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id" class="form-control" required>

                        <div class="mb-3">
                            <input type="text" class="form-control" name="description" placeholder="Book Description" required>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" id="" name="avb">
                                <option disabled selected hidden>Access</option>
                                <option name="0" value="0">Free</option>
                                <option name="1" value="1">Subscription Required</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select  id="category" type="number" class="form-select form-control @error('category') is-invalid @enderror" name="category" required  autocomplete="category">
                            <option disabled selected hidden>Select Category</option>
                            @foreach($category as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            </select>
                            </div> 
                        <div class="mb-3">
                            <input type="number" min="0" max="3000" class="form-control" name="value" placeholder="₦0" required>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold" for="book-thumbnail">Book Thumbnail (an image preview)</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold" for="book-thumbnail">Book File</label>
                            <input type="file" name="book" class="form-control" placeholder="" required>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <!-- End of Modal -->
    <section class="container-fluid my-2 vh-100">
        <div class="container mt-2">
            <div class="cont d-flex my-3 align-items-center">
            <h2 class="fw-bold">My Books & Materials</h2>
                <button class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Book</button>
            </div>
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach($view as $view)

                <div class="col">
                    <div class="card">
                        <!-- <img src="../assets/img/portfolio-4.jpg" class="card-img-top" alt="..."> -->
                        <img class="card-img-top" src="{{asset('files/'.$view->image)}}" alt="{{$view->image}}"/>
                        <div class="card-body">
                            <h5 class="card-title"> {{$view->title}}</h5>
                            <b>Book Author:</b> <span>{{$view->author}}</span>
                            <h6 class="" style="color: hsl(218, 81%, 75%);">Uploaded by <span>{{Auth::user()->lname}} {{Auth::user()->fname}}</span></h6>
                            <p class="card-text">{{$view->description}}</p>
                            <a href="{{asset('files/'.$view->book)}}"><input type="button" value="View" class="btn btn-primary"></a>
                            <a onclick="return confirm('Are you sure you want to delete this book?');" href={{"delete/".$view['id']}}><input style="background-color:red" type="button" value="Delete" class="btn btn-primary"></a>

                             @if ($view->value == '0')
                             <b><span style="float:right; color:green">Free</span></b>
                             @else
                             <b><span style="float:right; color:green">Value: ${{$view->value}}</span></b>
                             @endif

                        </div>
                        <div class="card-footer align-items-center d-block d-md-flex">

                        <div class="modal fade" id="exampleModal2" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel2"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        
                                        <h5 class="modal-title" id="exampleModalLabel2">Upload Questions</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2>Fill in the questions</h2>
                                        <form action="/admin/quiz" method="POST" enctype="multipart/form-data">
                                        @csrf
                                            <div class="mb-3">
                                            <input type="number"  name="book_id" id="bookID" class="form-control" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="q1" class="form-control" placeholder="Question 1">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="q2" class="form-control" placeholder="Question 2">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="q3" class="form-control" placeholder="Question 3">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="q4" class="form-control" placeholder="Question 4">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="q5" class="form-control" placeholder="Question 5">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="a1" class="form-control" placeholder="Answer 1">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <input type="text" name="a2" class="form-control" placeholder="Answer 2">
                                            </div>
                                        
                                            <div class="mb-3">
                                                <input type="text" name="a3" class="form-control" placeholder="Answer 3">
                                            </div>
                                        
                                            <div class="mb-3">
                                                <input type="text" name="a4" class="form-control" placeholder="Answer 4">
                                            </div>
                                        
                                            <div class="mb-3">
                                                <input type="text" name="a5" class="form-control" placeholder="Answer 5">
                                            </div>
                                            <div class="mb-3">
                                            </div>
                                            

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <span type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="float:left;" id="addBtn" class="addBtn btn ms-auto">Add Questions</span>
                        <b class="bkhidden"><span type="hidden" class="ms-auto">Book ID: <span type="hidden" class="book_id fw-bold">{{$view['id']}}</span></span></b>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
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

