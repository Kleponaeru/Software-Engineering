<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LUNA | Pengambil Sampah</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    {{-- <link rel="stylesheet" href="vertical-layout-light/style_dash.css"> --}}
    <link rel="stylesheet" href="{{ asset('style_dash.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="/pengambil/dashboard"><img
                        src="{{ asset('images/luna-icon.svg') }}" /></a>
                <a class="navbar-brand brand-logo-mini" href="/pengambil/dashboard"><img src="images/logo-mini.svg"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <a class="btn btn-primary" href="/pengambil/profile" role="button"><i
                        class="bi bi-person-circle"></i></a>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/pengambil/dashboard">
                            <span class="menu-title"><i class="bi bi-house-door-fill"></i> Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="/pengambil/titik-jemput" aria-expanded="false"
                            aria-controls="ui-basic">
                            <span class="menu-title"><i class="bi bi-geo-alt-fill"></i> Titik Jemput</span>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pengambil/luaran">
                            <span class="menu-title"><i class="bi bi-layout-sidebar-inset"></i> Luaran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item border-top" href="/logout"><i class="bi bi-box-arrow-right"></i>
                            Logout</a>
                        <i class="icon-paper menu-icon"></i>
                        </button>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Pengambil Sampah {{ Auth::user()->username ?? '' }}
                                    </h3>
                                    <h6 class="font-weight-normal mb-0">Kamu dapat melihat pengambilanmu di sini!
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <p class="card-title">Apa saja pengambilanmu?</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                @if (session('flash_added'))
                                                    <div class="alert alert-success alert-dismissible fade show"
                                                        role="alert" id="alert">
                                                        <strong>{{ session('flash_added') }}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <!-- Automatic dismissal using JavaScript -->
                                                    <script type="text/javascript">
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            setTimeout(function() {
                                                                var alert = document.getElementById('alert');
                                                                alert.parentNode.removeChild(alert);
                                                            }, 3500);
                                                        });
                                                    </script>
                                                @elseif (session('flash_edited'))
                                                    <div class="alert alert-warning alert-dismissible fade show"
                                                        role="alert" id="alert">
                                                        <strong>{{ session('flash_edited') }}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <!-- Automatic dismissal using JavaScript -->
                                                    <script type="text/javascript">
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            setTimeout(function() {
                                                                var alert = document.getElementById('alert');
                                                                alert.parentNode.removeChild(alert);
                                                            }, 3500);
                                                        });
                                                    </script>
                                                @elseif (session('flash_deleted'))
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert" id="alert">
                                                        <strong>{{ session('flash_deleted') }}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <!-- Automatic dismissal using JavaScript -->
                                                    <script type="text/javascript">
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            setTimeout(function() {
                                                                var alert = document.getElementById('alert');
                                                                alert.parentNode.removeChild(alert);
                                                            }, 3500);
                                                        });
                                                    </script>
                                                @elseif (session('flash_status'))
                                                    <div class="alert alert-info alert-dismissible fade show"
                                                        role="alert" id="alert">
                                                        <strong>{{ session('flash_status') }}</strong>
                                                        <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <!-- Automatic dismissal using JavaScript -->
                                                    <script type="text/javascript">
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                            setTimeout(function() {
                                                                var alert = document.getElementById('alert');
                                                                alert.parentNode.removeChild(alert);
                                                            }, 3500);
                                                        });
                                                    </script>
                                                @endif
                                                <table id="example" class="display expandable-table"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tujuan Buang</th>
                                                            <th>Berat</th>
                                                            <th>Jam Ambil</th>
                                                            <th>Jenis</th>
                                                            <th>Bank?</th>
                                                            <th>Pengambil?</th>
                                                            <th>Ambil/Tidak Ambil</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($orders as $idx => $n)
                                                            <tr>
                                                                <th scope="row">{{ $orders->firstItem() + $idx }}
                                                                </th>
                                                                <td>{{ optional($n->location)->nama_location }}</td>
                                                                <td>{{ $n->kg_sampah }} kg</td>
                                                                <td>{{ $n->jam }} WIB</td>
                                                                <td>{{ $n->jns_smph }}</td>
                                                                <td>
                                                                    <span
                                                                        class="badge
                                                                        @if ($n->status === 'Diterima') badge-success
                                                                        @elseif($n->status === 'Process')
                                                                            badge-warning
                                                                        @elseif($n->status === 'Ditolak')
                                                                            badge-danger @endif">
                                                                        {{ $n->status }}
                                                                    </span>
                                                                </td>
                                                                <td>{{ $n->pengambilan }}</td>
                                                                <td>

                                                                    <form method="POST"
                                                                        action="{{ route('confirm.status', ['id' => $n->id]) }}"
                                                                        style="display: inline-block;"
                                                                        @if ($n->status == 'Ditolak' || $n->status == 'Process') disabled @endif>
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="pengambilan"
                                                                            value="Sudah diambil">
                                                                        <button type="submit" class="btn btn-success"
                                                                            onclick="return confirm('Are you sure you want to confirm this?')"
                                                                            @if ($n->status == 'Ditolak' || $n->status == 'Process') disabled @endif>
                                                                            <i class="bi bi-check-circle-fill"></i>
                                                                        </button>
                                                                    </form>

                                                                    <form method="POST"
                                                                        action="{{ url('/status/change/' . $n->id) }}"
                                                                        style="display: inline-block;"
                                                                        @if ($n->status == 'Ditolak' || $n->status == 'Process') disabled @endif>
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="pengambilan"
                                                                            value="Tidak bisa diambil">
                                                                        <button type="submit" class="btn btn-danger"
                                                                            onclick="return confirm('Are you sure you want to reject this?')"
                                                                            @if ($n->status == 'Ditolak' || $n->status == 'Process') disabled @endif>
                                                                            <i class="bi bi-x-circle-fill"></i>
                                                                        </button>
                                                                    </form>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->

                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023.
                            LUNA
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->

    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
