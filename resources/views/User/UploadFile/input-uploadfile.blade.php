<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dahsboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('build/assets/lib/owlcarousel/owl.carousel.min.css')}}" rel="stylesheet">
     <link href="{{asset('build/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('build/assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('build/assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
    
    
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">Dashboard</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{ Auth::user()->image ? url('storage/' . Auth::user()->image) : asset('build/assets/img/Login.png') }}" alt="" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <@auth
                        <div class="ms-3">
                            <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                            <span>{{ auth()->user()->jabatan }}</span>
                        </div>
                    @endauth
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{route('homepage')}}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('index-uploadfile')}}" class="nav-item nav-link active"><i class="fa fa-file-pdf me-2"></i>Upload File</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
    
    
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{ Auth::user()->image ? url('storage/' . Auth::user()->image) : asset('build/assets/img/Login.png') }}" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ auth()->user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{route('index_user')}}" class="dropdown-item">My Profile</a>
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                                <span>{{ __('Logout') }}</span>
                                <form action="{{ route('logout') }}" id="logout-form" method="post">
                                @csrf                   
                                </form>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Form Input Jenis FIle</h6>
                             <form action="{{route('store_upload')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="namafile" class="form-label">Name File</label>
                                    <input type="text" class="form-control" id="namafile"
                                        aria-describedby="namafile" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="typefile" class="form-label">Type File</label>
                                    <input type="text" class="form-control" id="typefile" name="type_file" aria-describedby="namafile">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">file input</label>
                                    <input class="form-control" type="file" id="formFile" name="file">
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                   
                   
                </div>
            </div>
            <!-- Form End -->


        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
     <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('build/assets/lib/chart/chart.min.js')}}"></script>
    <script src="{{asset('build/assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('build/assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('build/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('build/assets/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('build/assets/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('build/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Javascript -->
    <script src="{{asset('build/assets/js/main.js')}}"></script>
</body>

</html>