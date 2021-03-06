<?php
session_start();
include 'include/index_process.php';
include 'include/dashboard_process.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Neighbor Web - UserProfile</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/profile.css" rel="stylesheet" >

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
          <a class="dropdown-item" href="#">Activity Log</a>
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
          <h6 class="dropdown-header">All Threads:</h6>
          <a class="dropdown-item" href="threads.php?type=0">Friends</a>
          <a class="dropdown-item" href="threads.php?type=1">Neighbors</a>
          <a class="dropdown-item" href="threads.php?type=2">Block</a>
          <a class="dropdown-item" href="threads.php?type=0">Hood</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Messages</h6>
          <a class="dropdown-item" href="404.html">Friends Apply</a>
          <a class="dropdown-item active" href="404.html">Block Apply</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="neighbors.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Neighbors</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Account/My Profile</li>
        </ol>

        <!-- Page Content -->
        <h1>My Profile</h1>
        <hr>

        <!-- z-h-p -->
        <div class="avatar-box">
            <div class="avatar">
                <img src="pic/img_login_avatar.png">
            </div>
            <a href="#" id="uploadAvatar">
              <div class="avatar-mask text-center">
                  <i class="fas fa-camera-retro"></i>
              </div>
            </a>
            <input type="file" id="uploadInput" name="avatar" accept="image/*">
        </div>

        <form class="foo" id = "form">
          <div class="form-group">
            <label for="nicknameinput">Nick Name</label>
            <input type="text" class="form-control" id="nicknameinput" name = "unickname" value = "">
          </div>

          <div class="form-group">
            <label for="self_introduction">Self Introduction</label>
            <textarea class="form-control" id="self_introduction" rows="3" name = "self_introduction" value = ""></textarea>
          </div>

          <div class="form-group">
            <label for="family_introduction">Family Introduction</label>
            <textarea class="form-control" id="family_introduction" rows="4" name = "family_introduction" value = ""></textarea>
          </div>
          <center><button type="submit" class="btn btn-primary btn-lg">Change Profile</button></center>
        </form>

        <form>
          <div class="form-row">
            <div class="col-md-6 mb-3">
              <label for="validationServer03">City</label>
              <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
<!--              <div class="invalid-feedback">-->
<!--                Please provide a valid city.-->
<!--              </div>-->
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationServer04">State</label>
              <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
<!--              <div class="invalid-feedback">-->
<!--                Please provide a valid state.-->
<!--              </div>-->
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationServer05">Zip</label>
              <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required>
<!--              <div class="invalid-feedback">-->
<!--                Please provide a valid zip.-->
<!--              </div>-->
            </div>
          </div>
        </form>

      </div>
      <!-- /.container-fluid -->


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

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <script src="js/userProfile.js"></script>
</body>

</html>
