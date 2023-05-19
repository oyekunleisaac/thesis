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
    <section class="container-fluid my-2 vh-100">
    <div class="container mt-2">
    <br><h3>Admin Dashboard</h3><br>
    <div class="dropdown custom-dropdown ms-3">
                    <!-- <button type="button" class="btn btn-primary light d-flex align-items-center svg-btn" data-toggle="dropdown" aria-expanded="false">
                        <svg width="16" height="16" class="scale5" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.4281 2.856H21.8681V1.428C21.8681 0.56 21.2801 0 20.4401 0C19.6001 0 19.0121 0.56 19.0121 1.428V2.856H9.71606V1.428C9.71606 0.56 9.15606 0 8.28806 0C7.42006 0 6.86006 0.56 6.86006 1.428V2.856H5.57206C2.85606 2.856 0.560059 5.152 0.560059 7.868V23.016C0.560059 25.732 2.85606 28.028 5.57206 28.028H22.4281C25.1441 28.028 27.4401 25.732 27.4401 23.016V7.868C27.4401 5.152 25.1441 2.856 22.4281 2.856ZM5.57206 5.712H22.4281C23.5761 5.712 24.5841 6.72 24.5841 7.868V9.856H3.41606V7.868C3.41606 6.72 4.42406 5.712 5.57206 5.712ZM22.4281 25.144H5.57206C4.42406 25.144 3.41606 24.136 3.41606 22.988V12.712H24.5561V22.988C24.5841 24.136 23.5761 25.144 22.4281 25.144Z" fill="#2F4CDD"/></svg>
                        <span class="fs-16 ms-3">Today</span>
                        <i class="fa fa-angle-down scale5 ms-3"></i>
                    </button> -->
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Monday</a>
                        <a class="dropdown-item" href="#">Tuesday</a>
                        <a class="dropdown-item" href="#">Wednesday</a>
                        <a class="dropdown-item" href="#">Thursday</a>
                        <a class="dropdown-item" href="#">Friday</a>
                        <a class="dropdown-item" href="#">Saturday</a>
                        <a class="dropdown-item" href="#">Sunday</a>
                    </div>
                

                <div class="table-responsive p-3">
                <table id="example" class="table table-striped">
                    <thead style="height: 10px !important; overflow: scroll;">
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Which subject</th>
                            <th>How long have you been teaching?</th>
                            <th>Do you have materials?</th>
                            <th>Do you have copyrighted materials?</th>
                            <th>Are you willing to share them?</th>
                            <th>Status</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($verify as $verify)

                    <tr>
                        <td>{{$loop->iteration}}</td>                        
                        <td>{{$verify->user->fname}}</td>
                        <td>Admin</td>
                        <td>{{$verify['sub']}}</td>                      
                        <td>{{$verify['dur']}}</td>                      
                        <td>{{$verify['free']}}</td>                      
                        <td>{{$verify['copy']}}</td>                      
                        <td>{{$verify['share']}}</td> 
                        <form action="verification" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$verify['id']}}">
                        <input type="hidden" name="user_id" value="{{$verify->user_id}}">                     
                        <input type="hidden" name="sub" value="{{$verify['sub']}}">                     
                        <input type="hidden" name="dur" value="{{$verify['dur']}}">                     
                        <input type="hidden" name="free" value="{{$verify['free']}}">                     
                        <input type="hidden" name="copy" value="{{$verify['copy']}}">                     
                        <input type="hidden" name="share" value="{{$verify['share']}}">                     
                        <input type="hidden" name="role" value="1">                     

                            @if ($verify->role == 0)
                            <td><input onclick="return confirm('You are about to verify this author?');" type="submit" value="Verify" class="btn btn-primary"></td>                                              
                            <td><input onclick="return confirm('You are about to verify this author?');" type="submit" value="Verify" class="btn btn-primary"></td>                                              
                            <!-- <td><input style="background-color:darkblue" onclick="return confirm('This author is verified');" type="button" value="✓" class="btn btn-primary"></td>                                               -->
                            @elseif ($verify->role == 1)
                            <td><input style="background-color:green" onclick="return confirm('This author is verified');" type="button" value="Verified" class="btn btn-primary"></td> 
                            
                            <form action="verification" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$verify['id']}}">
                        <input type="hidden" name="user_id" value="{{$verify->user_id}}">                     
                        <input type="hidden" name="sub" value="{{$verify['sub']}}">                     
                        <input type="hidden" name="dur" value="{{$verify['dur']}}">                     
                        <input type="hidden" name="free" value="{{$verify['free']}}">                     
                        <input type="hidden" name="copy" value="{{$verify['copy']}}">                     
                        <input type="hidden" name="share" value="{{$verify['share']}}">                     
                        <input type="hidden" name="role" value="0">       
                            <td><input style="background-color:red" type="submit" value="Unverify" class="btn btn-primary"></td>                                              
                            @endif
                        
                    

                            </form> 
                        </form> 
                    </tr>
                    @endforeach  

                    </tbody>  
                    
                </table>
              </div>
        </div>        
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <script src="admin-script.js"></script>
    <script src="admin-charts.js"></script>


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
</body>
</html>