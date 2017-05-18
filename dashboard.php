<?php
session_start();
include ("dbconnect.php");
include "functions.php";

// http://usebootstrap.com/theme/facebook

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
  <link rel="stylesheet" href="style.css" />
   <link rel="stylesheet" href="comment.css" />

 

 
 
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
 <button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-success">Post Task</button>

 </div>
 </div>
 </form>
 </div>
 </div>
 </nav>
 
 
 
 <!--
<div class="center"><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">Post Task</button></div>
-->

 


<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h3 class="modal-title" id="lineModalLabel">What's your Task?</h3>
		</div>
		<div class="modal-body">
			
            <!-- content goes here -->
			  
	<form method="post" action="post-action.php">
              <div class="form-group">
                <label for="exampleInputEmail1">Task Title</label>
                <textarea name="post_title" class="form-control" placeholder="eg:need a cleaner"></textarea>
                  
              </div>
              
              <div class="form-group">
                <label for="exampleInputPassword1">Describe your task in more detail</label>
         <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" name="post_msg" required></textarea>
                                </div>
                            </div>
                                          </div>

          

		</div>
		<div class="modal-footer">
			<div class="btn-group btn-group-justified" role="group" aria-label="group button">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
				</div>
				<div class="btn-group btn-delete hidden" role="group">
					<button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
				</div>
				<div class="btn-group" role="group">
					<button type="submit" name="post"  class="btn btn-default btn-hover-green" value="Post">Post</button>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>
  </form>
 
 
 
 
 
 
 
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
  <a href="Blog.php"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Blog</a>
 </li>
 <li>
 
 <li>
 
 </ul>
 </div>
 <!-- /#sidebar-wrapper -->
 
 
 
 <!--
 <!-- Page Content -->
 
 
  <!--

 <div id="page-content-wrapper">
 <div class="container-fluid">
 <div class="row">
 <div class="col-md-6 ">
 <form action="post-action.php" method="post" role="form" enctype="multipart/form-data" class="facebook-share-box">
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
                      <div class="panel-heading"><i class="fa fa-file"></i> Update Task</div>
                      <div class="panel-body">
                        <div class="">
                        	<form method="post" action="post-action.php">
                            <textarea name="post_msg" cols="40" rows="10"  class="form-control message" style="height: 62px; overflow: hidden;" placeholder="What's your Task?"></textarea> 
					                   <input type="text" name="uname" placeholder="type your name here..." required /><br>
						</div>
                      </div>
						<div class="panel-footer">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<div class="btn-group">
											  
											</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											                                   
											<input type="submit" name="post" value="Post" class="btn btn-primary">                               
										</div>
									</div>
								</div>
						</div>
                    </div>
			</div>
			</div>
		</form>
		
		<?php
 
if (isset($_GET['post_action'])) {
 
if ($_GET['post_action'] == "posted") {
 
echo 'Successfully Posted!';
 
}
 
}
 
?>
 </div>
 </div>
 </div>

-->
 
 </div>
 
 <!-- /#page-content-wrapper -->
 </div>
 </div>
 <!-- /#wrapper -->

  
  
   <?php
 
$posts = mysqli_query($con,"SELECT * FROM posts ORDER BY post_id DESC");
 
?>
                    
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<div class="container">
   
    <?php
 
if ($posts->num_rows == null) {
 
echo 'no posts yet';
 
} else if ($posts->num_rows != null) {
 
while ($post_data = $posts->fetch_assoc()) {
      


?>


    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b> 
                            
 <?php 
   
 
   
    ?>
    </b></a>
                           
                        </div>
                        <h6 class="text-muted time"><?php 
                        
                    
         
       echo timeAgo($time_ago);
                        
                        
                        ?>
                      </h6>
                    </div>
                </div> 
                <div class="post-description"> 
      <?php 
      echo $post_data['post_title']?> </br></br>
     <?php  echo $post_data['post_msg'] ?>
                    <div class="stats">
                        <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-up icon"></i>2
                        </a>
                        <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-down icon"></i>12
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        <div class="bod">
.
</div>

        <?php }
 
}
 
?>
        </div>




 
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