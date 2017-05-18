<?php
session_start();
include_once 'dbconnect.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="author" content="">
 <link rel="icon" href="../../favicon.ico">
 
 <!-- http://draganzlatkovski.com/code-projects/toggle-jquery-side-bar-menu-in-bootstrap-free-template/ -->
 
 <title>Dashboard Template for Bootstrap</title>
 
 <!-- jQuery -->
 
 <script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="components/bootstrap/dist/js/jquery.js"></script>
 
  
 
 <!-- Bootstrap core CSS -->
 <link href="components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
 
 <!-- Custom styles for this template -->
 <link href="components/bootstrap/dist/css/simple-sidebar.css" rel="stylesheet">
 <link rel="stylesheet" href="components/bootstrap/dist/css/postataskbox.css" />

 

 
 
</head>

<body>
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 <div class="container-fluid">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
 <span class="sr-only">Toggle navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
 </div>
 <div id="navbar" class="navbar-collapse collapse">
  
  
  
  
 <ul class="nav navbar-nav navbar-right">
  

 <li><a href="#"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Notification </a></li>
 
 <li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a></li>
 </ul>
 <form class="navbar-form navbar-right" action="#" method="GET">
 <div class="input-group">
 <input type="text" class="form-control" placeholder="Search..." id="query" name="search" value="">
 <div class="input-group-btn">
 <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
 </div>
 </div>
 </form>
 </div>
 </div>
 </nav>
 
 <div id="wrapper" class="toggled">
 <div class="container-fluid">
 <!-- Sidebar -->
 <div id="sidebar-wrapper">
 <ul class="sidebar-nav">
 <li class="sidebar-brand">
 <br>
 </li>
 <li class="sidebar-brand">
 <a href="#" class="navbar-brand">
  
   <?php 
   
   if (isset($_SESSION['usr_id']))
   
   { ?>
               
 <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['usr_name'];
 
   }
   
 ?>
 
 </a>
 </li>
 <li>
 <a href="dashboard.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
 </li>
 <!--
 <li>
 <a href="#"><span  class="glyphicon glyphicon-comment"  aria-hidden="true"></span> Notification</a>
 </li> 
 
 -->
 <li>
  <a href="mytask.php"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> My Task</a>
 </li>
 <li>
  <a href="Blog.php"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>Blog</a>
 </li>
 
 
 <li>
 
 </ul>
 </div>
 <!-- /#sidebar-wrapper -->
 
 <!-- Page Content -->
 
 <div id="page-content-wrapper">
 <div class="container-fluid">
 <div class="row">
 <div class="col-lg-12">
 <br>
 <h1>Content Goes here</h1>
 </div>
 </div>

 </div>
 </div>
 
 <!--
 
  <div class="container">
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form action="#" method="post" role="form" enctype="multipart/form-data" class="facebook-share-box">
			<ul class="post-types">
				<li class="post-type">
					<a class="status" title="" href="#"><i class="icon icon-file"></i> Share an Update</a>
				</li>
				<li class="post-type">
					<a class="photos" href="#"><i class="icon icon-camera"></i> Add photos</a>
				</li>
			</ul>
			<div class="share">
				<div class="arrow"></div>
				<div class="panel panel-default">
                      <div class="panel-heading"><i class="fa fa-file"></i> Update Status</div>
                      <div class="panel-body">
                        <div class="">
                            <textarea name="message" cols="40" rows="10" id="status_message" class="form-control message" style="height: 62px; overflow: hidden;" placeholder="What's on your mind ?"></textarea> 
						</div>
                      </div>
						<div class="panel-footer">
								<div class="row">
									<div class="col-md-7">
										<div class="form-group">
											<div class="btn-group">
											  <button type="button" class="btn btn-default"><i class="icon icon-map-marker"></i> Location</button>
											  <button type="button" class="btn btn-default"><i class="icon icon-picture"></i> Photo</button>
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<select name="privacy" class="form-control privacy-dropdown pull-left input-sm">
												<option value="1" selected="selected">Public</option>
												<option value="2">Only my friends</option>
												<option value="3">Only me</option>
											</select>                                    
											<input type="submit" name="submit" value="Post" class="btn btn-primary">                               
										</div>
									</div>
								</div>
						</div>
                    </div>
			</div>
			</div>
		</form>
	</div>
	</div>
	</div> 
	
 -->
 
 <!-- /#page-content-wrapper -->
 </div>
 </div>
 <!-- /#wrapper -->

 
<!-- Bootstrap Core JavaScript -->
<script src="components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
 $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>


	<script type="text/javascript">
		$(document).ready(function(){
			$('.status').click(function() { $('.arrow').css("left", 0);});
			$('.photos').click(function() { $('.arrow').css("left", 146);});
		});
	</script>
	

</body>
</html>