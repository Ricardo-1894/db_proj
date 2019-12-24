<?php
/**
 * @author     (Haopeng Zhao <hz2151@nyu.edu>)
 * front end for all kinds of threads
 */
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

    <title>Neighbor Web - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/msg_container.css" rel = "stylesheet">
    <link href="css/fontawesome.css" rel="stylesheet">
    <link href="css/brands.css" rel="stylesheet">
    <link href="css/solid.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

	<a class="navbar-brand mr-1" href="dashboard.php">Start</a>

	<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
	  <i class="fas fa-bars"></i>
	</button>

	<!-- Navbar Search -->
	<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" id = "search_form">
		<select class="form-control" id="search_select" name="search_type" required>
			<option value="Thread">Thread</option>
			<option value="Friend">Friend</option>
			<option value="Block">Block</option>
		</select>
		<input type="text" class="form-control" id = 'search_input' placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
		<button type = 'submit' class="btn btn-primary" type="button">
			<i class="fas fa-search"></i>
		</button>
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
		  <span class="badge badge-danger"><?php total_unread_msg_count(); ?></span>
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
	  <li class="nav-item active">
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
				<a class="dropdown-item" href="threads.php?type=3">Hood</a>
				<div class="dropdown-divider"></div>
				<h6 class="dropdown-header">Other Messages</h6>
				<a class="dropdown-item" href="friendapply.php">Friends Apply</a>
				<a class="dropdown-item active" href="blockapply.php">Block Apply</a>
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
		  <li class="breadcrumb-item">
			<a href="#">Pages</a>
		  </li>
		  <li class="breadcrumb-item active" id = "content_name"></li>
		</ol>

        <!-- Contents of friend chats-->
          <!-- message show -->

          <div id="all_threads">
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

        <!-- msg template -->
<!--        <srcipt id="msg_template" type = "text/html">-->
<!--            <%for (var i = 0; i < data.length; ++i) {%>-->
<!--            <%=i%>-->
<!--            <%}%>-->
<!--        </srcipt>-->

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
  <script id="msg_template" type = "text/html">
      <%for (var i = 0;i < data.length;++i) {%>
      <div class = "message-container" data-mid="<%=data[i].thread_id%>">
          <div class="message-box">
              <div class="msg-item msg-sender row">
                  <div class="col-1">
                      <div class="avatar">
                          <%if (data[i].msgs[0].photo_link != null && data[i].msgs[0].photo_link != "") {%>
                          <img src="../<%=data[i].msgs[0].photo_link%>">
                          <%} else {%>
                          <img src="../pic/img_login_avatar.png">
                          <%} %>
                      </div>
                  </div>
                  <div class="col-11 sender-info">
                    <span>
                        <span class="sender-name"><%=data[i].msgs[0].unickname%></span>
                    </span>
                  </div>
              </div>

              <div class="msg-item msg-title">
                  <h5><%=data[i].thread_name%></h5>
              </div>

              <div class="msg-item msg-content">
                  <%=data[i].msgs[0].textbody%>
              </div>

              <div class="msg-item msg-time">
                  <span><%=data[i].msgs[0].timestamp%></span>
                  <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              </div>

              <div class="msg-item msg-buttons">
                  <button class="btn btn-no-border" id="writeReply">
                      <i class="far fa-comment-alt"></i>
                      <span>reply</span>
                  </button>
                  <button class="btn btn-no-border  float-right" id="showReplies">
                      <i class="far fa-comment-dots"></i>
                      <span>comment</span>
                      <span class="reply-num"><%=data[i].msgs.length-1%></span>
                  </button>
              </div>

              <div class="reply-box">
                  <% for (var j = 1; j < data[i].msgs.length; j++) {%>
                  <div class="msg-item other-reply row">
                      <div class="col-1">
                          <div class="avatar">
                              <%if (data[i].msgs[j].photo_link != null && data[i].msgs[j].photo_link != "") {%>
                              <img src="../<%=data[i].msgs[j].photo_link%>">
                              <%} else {%>
                              <img src="../pic/img_login_avatar.png">
                              <%}%>
                          </div>
                      </div>
                      <div class="col-11 reply-content">
                          <div class="reply-info">
                              <div class="sender-info">
                                  <span class="sender-name"><%=data[i].msgs[j].unickname%></span>
                              </div>
                              <div class="reply-body">
                                  <%=data[i].msgs[j].textbody%>
                              </div>
                              <div class="msg-item msg-time">
                                  <span><%=data[i].msgs[j].timestamp%></span>
                              </div>
                          </div>
                      </div>
                      <!-- <div class="col-1"></div> -->
                  </div>
                  <%}%>
              </div>

              <div class="msg-item your-reply row">
                  <div class="col-1 my-avatar">
                      <div class="avatar">
                        <img src="../pic/img_login_avatar.png">
                      </div>
                  </div>
                  <div class="col-11 reply-input">
                      <textarea class="form-control reply-text" name="textBody" rows="2" placeholder="message body" required=""></textarea>
                      <button class="btn btn-primary reply-btn float-right send-reply">Reply</button>
                  </div>
                  <!-- <div class="col-1"></div> -->
              </div>
          </div>
      </div>
      <%}%>
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/dashboard.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script type="text/javascript" src="js/baiduTemplate.js"></script>
  <script src="js/threads.js"></script>
  <script src="js/search.js"></script>

</body>

</html>

