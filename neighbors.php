<?php
session_start();
include 'include/index_process.php';
?>

<!DOCTYPE php>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search result</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="dashboard.php">Start</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger">9+</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="userprofile.php">My Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Login Screens:</h6>
                <a class="dropdown-item" href="index.php">Login</a>
                <a class="dropdown-item" href="register.php">Register</a>
                <a class="dropdown-item" href="forgot-password.php">Forgot Password</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Other Pages:</h6>
                <a class="dropdown-item" href="404.php">404 Page</a>
                <a class="dropdown-item" href="blank.php">Blank Page</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="###">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="neighbors.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Neighbors</span></a>
        </li>
    </ul>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="dashboard.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Neighbors</li>
            </ol>

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Your Neighbors</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Self Intro</th>
                                <th>Family Intro</th>
                                <th>Age</th>
                                <th>Building</th>
                                <th>Friend Apply</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>Hi, I'm Tiger.</td>
                                <td>--</td>
                                <td>19</td>
                                <td>Avalon FG</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>I am an accountant</td>
                                <td>--</td>
                                <td>63</td>
                                <td>Brooklyn Air</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Ashton Cox</td>
                                <td>Want for some friends here</td>
                                <td>--</td>
                                <td>66</td>
                                <td>Brooklyn Air</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Cedric Kelly</td>
                                <td>I am senior Javascript Developer</td>
                                <td>--</td>
                                <td>22</td>
                                <td>Avalon FG</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Airi Satou</td>
                                <td>I am Airi.</td>
                                <td>--</td>
                                <td>33</td>
                                <td>Avalon Dobro</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Brielle Williamson</td>
                                <td>Integration Specialist</td>
                                <td>Single</td>
                                <td>61</td>
                                <td>Avalon Dobro</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Herrod Chandler</td>
                                <td>Sales Assistant</td>
                                <td>Married</td>
                                <td>59</td>
                                <td>Brooklyn Air</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Rhona Davidson</td>
                                <td>Cycling</td>
                                <td>Nothing to say</td>
                                <td>55</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Colleen Hurst</td>
                                <td>Cycling</td>
                                <td>Nothing to say</td>
                                <td>25</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Sonya Frost</td>
                                <td>Software Engineer</td>
                                <td>Nothing here</td>
                                <td>23</td>
                                <td>Brooklyn Air</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Jena Gaines</td>
                                <td>Software Engineer</td>
                                <td>Nothing here</td>
                                <td>23</td>
                                <td>Brooklyn Air</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Quinn Flynn</td>
                                <td>Swimming</td>
                                <td>Nothing to say</td>
                                <td>25</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Charde Marshall</td>
                                <td>Swimming</td>
                                <td>Nothing to say</td>
                                <td>25</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Haley Kennedy</td>
                                <td>Swimming</td>
                                <td>Single</td>
                                <td>25</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Tatyana Fitzpatrick</td>
                                <td>Hi, I'm Tatyana.</td>
                                <td>--</td>
                                <td>19</td>
                                <td>Avalon FG</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Michael Silva</td>
                                <td>Hi, there.</td>
                                <td>--</td>
                                <td>29</td>
                                <td>Avalon Dobro</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Paul Byrd</td>
                                <td>Hi, there.</td>
                                <td>--</td>
                                <td>29</td>
                                <td>Avalon Dobro</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Gloria Little</td>
                                <td>Hi, there.</td>
                                <td>--</td>
                                <td>29</td>
                                <td>Avalon Dobro</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Bradley Greer</td>
                                <td>Software Engineer</td>
                                <td>Single</td>
                                <td>25</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Dai Rios</td>
                                <td>Personnel Lead</td>
                                <td>Married</td>
                                <td>25</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Jenette Caldwell</td>
                                <td>Development Lead</td>
                                <td>Single</td>
                                <td>25</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Yuri Berry</td>
                                <td>Chief Marketing Officer (CMO)</td>
                                <td>Single</td>
                                <td>25</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Caesar Vance</td>
                                <td>Pre-Sales Support</td>
                                <td>Single</td>
                                <td>25</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Doris Wilder</td>
                                <td>Sales Assistant</td>
                                <td>Single</td>
                                <td>26</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Angelica Ramos</td>
                                <td>Chief Executive Officer (CEO)</td>
                                <td>Single</td>
                                <td>25</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Gavin Joyce</td>
                                <td>Cycling</td>
                                <td>Nothing to say</td>
                                <td>55</td>
                                <td>The Eagle</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Jennifer Chang</td>
                                <td>Swimming</td>
                                <td>Nothing to say</td>
                                <td>55</td>
                                <td>Avalon FG</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Brenden Wagner</td>
                                <td>Software Engineer</td>
                                <td>My family is in San Francisco</td>
                                <td>28</td>
                                <td>Azura</td>
                                <td>Apply Link</td>
                            </tr>
                            <tr>
                                <td>Suki Burks</td>
                                <td>I am a solid Developer</td>
                                <td>Married</td>
                                <td>32</td>
                                <td>Azura</td>
                                <td>Apply Link</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="fixed-bottom">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Neighbor Web 2019</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="include/logout_process.php">Log Out!</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="vendor/datatables/jquery.dataTables.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="js/demo/datatables-demo.js"></script>

<scrpit src="js/show_neighbors.js"></scrpit>

</body>

</html>
