<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Library</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href={{"/assets/img/library.png"}} rel="icon">


    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href={{"/assets/vendor/bootstrap/css/bootstrap.min.css"}} rel="stylesheet">
    <link href={{"/assets/vendor/bootstrap-icons/bootstrap-icons.css"}} rel="stylesheet">
    <link href={{"/assets/vendor/boxicons/css/boxicons.min.css"}} rel="stylesheet">
    <link href={{"/assets/vendor/quill/quill.snow.css"}} rel="stylesheet">
    <link href={{"/assets/vendor/quill/quill.bubble.css"}} rel="stylesheet">
    <link href={{"/assets/vendor/remixicon/remixicon.css"}} rel="stylesheet">
    <link href={{"/assets/vendor/simple-datatables/style.css"}} rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href={{"/assets/css/style.css"}} rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/admin/books" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Library</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="/storage/{{auth()->user()->avatar}}" width="100%" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->name}}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <p>{{auth()->user()->email}}</p>
                            <span>Libraian</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            {{-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#author-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i> <span>Author Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="author-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="#">
                            <i class="bi bi-circle"></i><span>Author Lists</span>
                        </a>

                    </li>
                </ul>
            </li><!-- End Tables Nav --> --}}
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-book"></i> <span>Book Management</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{route('books.index')}}">
                            <i class="bi bi-circle"></i><span>All Books</span>
                        </a>

                    </li>

                    <li>
                        <a href="{{route('books.create')}}">
                            <i class="bi bi-circle"></i><span>Add Book</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-bookmark-check"></i><span>Circulation Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="orders-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{route('borrowed.create')}}">
                            <i class="bi bi-circle"></i><span>Borrow Book</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('borrowed.index')}}">
                            <i class="bi bi-circle"></i><span>Borrowed Book List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('histories.index')}}">
                            <i class="bi bi-circle"></i><span> History</span>
                        </a>
                    </li>


                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#members-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>Users Management</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="members-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{route('members.create')}}">
                            <i class="bi bi-circle"></i><span>Register</span>
                        </a>

                    </li>

                    <li>
                        <a href="/get-librarians">
                            <i class="bi bi-circle"></i><span>Libraians </span>
                        </a>

                    </li>
                    <li>
                        <a href="/get-members">
                            <i class="bi bi-circle"></i><span>Members </span>
                        </a>

                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#libraians-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-check"></i><span>Libraians Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="libraians-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="/admin/register">
                            <i class="bi bi-circle"></i><span>Register</span>
                        </a>

                    </li>

                    <li>
                        <a href="/admin/librarians">
                            <i class="bi bi-circle"></i><span>Libraian Lists </span>
                        </a>

                    </li>
                </ul>
            </li> --}}
        </ul>

    </aside>

    <main id="main" class="main">

        @yield('main')

    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src={{"/assets/vendor/apexcharts/apexcharts.min.js"}}></script>
    <script src={{"/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"}}></script>
    <script src={{"/assets/vendor/chart.js/chart.umd.js"}}></script>
    <script src={{"/assets/vendor/echarts/echarts.min.js"}}></script>
    <script src={{"/assets/vendor/quill/quill.min.js"}}></script>
    <script src={{"/assets/vendor/simple-datatables/simple-datatables.js"}}></script>
    <script src={{"/assets/vendor/tinymce/tinymce.min.js"}}></script>
    <script src={{"/assets/vendor/php-email-form/validate.js"}}></script>

    <!-- Template Main JS File -->
    <script src={{"/assets/js/main.js"}}></script>

</body>

</html>