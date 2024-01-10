<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dahsboard Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('build/assets/img/favicon.ico')}}" rel="icon">

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
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    @auth
                        <div class="ms-3">
                            <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                            <span>{{ auth()->user()->jabatan }}</span>
                        </div>
                    @endauth
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{route('homepage')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('index-uploadfile')}}" class="nav-item nav-link"><i class="fa fa-file-pdf me-2"></i>Upload File</a>
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
                            <img class="rounded-circle me-lg-2" src="{{ Auth::user()->image ? url('storage/' . Auth::user()->image) : asset('build/assets/img/Login.png') }}" alt="" style="width: 40px; height: 40px;">
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

            <!-- Sale & Revenue Start -->
            <!-- <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-users fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total File</p>
                                <h6 class="mb-0"></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-file-word fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total PDF</p>
                                <h6 class="mb-0"></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-file fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Word</p>
                                <h6 class="mb-0"></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Sale & Revenue End -->
            <!-- Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <iframe class="position-relative rounded w-100 h-100" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63608.275479945!2d104.79877781302578!3d-4.852612852833285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e38a8de6448360d%3A0x893148fbdbf617d0!2sRSD%20Mayjend%20HM%20Ryacudu!5e0!3m2!1sid!2sid!4v1698860838077!5m2!1sid!2sid" 
                            width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                    <div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">To Do List</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex mb-2">
                                <input class="form-control bg-transparent" id="noteInput" type="text" placeholder="Enter task">
                                <button onclick="addNote()" type="button" class="btn btn-primary ms-2">Add</button>
                            </div>
                            <div id="noteList">
                            <div class=" d-flex align-items-center border-bottom py-2">
                                <div id="noteList"  class="w-100 ms-3">
                                    <div class="d-flex w-100 align-items-center justify-content-between">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Chart End -->


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

    <!-- Template Javascript -->
    <script src="{{asset('build/assets/js/main.js')}}"></script>
    <script>
       function addNote() {
    const noteInput = document.getElementById("noteInput");
    const noteText = noteInput.value;

    if (noteText.trim() === "") {
        alert("Catatan tidak boleh kosong");
    } else {
        const noteList = document.getElementById("noteList");
        const noteDiv = document.createElement("div"); // Membuat elemen div untuk catatan
        noteDiv.className = "d-flex align-items-center border-bottom py-2";
        
        const span = document.createElement("span"); // Membuat elemen span untuk teks catatan
        span.textContent = noteText;

        const deleteBtn = document.createElement("button"); // Membuat tombol hapus
        deleteBtn.className = "btn btn-sm deleteBtn";
        deleteBtn.innerHTML = '<i class="fa fa-times"></i>';
        
        // Menambahkan event listener untuk menghapus catatan saat tombol hapus diklik
        deleteBtn.addEventListener("click", function () {
            noteDiv.remove();
        });

        noteDiv.appendChild(span);
        noteDiv.appendChild(deleteBtn);
        noteList.appendChild(noteDiv);
        noteInput.value = "";
    }
}
 
    </script>
</body>

</html>