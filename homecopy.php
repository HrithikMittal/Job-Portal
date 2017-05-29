

<?php

	require_once("session.php");
	
	require_once("class.user.php");

	
	$check  = new USER;
	$get    = new USER;
	$send   = new USER;
 
 
 
   	//fetching user data by user_id
	$data  = $get->user_data($user_id);
	
	// fetching posts from database
	$post  = $get->posts();
	
	// fetching comments from database
	
	
	//check user submit  data
	if(isset($_POST['submit'])){
		$status  = $_POST['status'];
		$status_title  = $_POST['status_title'];
		
					$send->add_post($user_id,$status_title,$status,$file_parh);
				}
			 	 

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
  <link href="components/bootstrap/dist/css/animate.css" rel="stylesheet">
  <link href="components/bootstrap/dist/css/hey.css" rel="stylesheet">
  <link href="components/bootstrap/dist/css/LRmodal.css" rel="stylesheet">
    <link href="components/bootstrap/dist/js/LRmodal.js" rel="stylesheet">



   <link rel="stylesheet" href="comment.css" />
<link href="http://cdn.phpoll.com/css/animate.css" rel="stylesheet">
<link href="http://daneden.github.io/animate.css/" rel="stylesheet">

 
 
 
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
 
  <label class="navbar-text text-center text-primary" style="vertical-align:10px;font-size:medium ">HelpEachOther</label>


<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					
				</div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form id="login-form">
		                <div class="modal-body">
				    		
				    		<input id="login_username" class="form-control" type="text" placeholder="Username" required>
				    		<input id="login_password" class="form-control" type="password" placeholder="Password" required>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
        		    	</div>
				        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
                            </div>
				    	    <div>
                                <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                                <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
                            </div>
				        </div>
                    </form>
                    <!-- End # Login Form -->
                    
                    <!-- Begin | Lost Password Form -->
                    <form id="lost-form" style="display:none;">
    	    		    <div class="modal-body">
		    				
		    				<input id="lost_email" class="form-control" type="text" placeholder="E-Mail" required>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-success btn-lg btn-block">Send</button>
                            </div>
                            <div>
                                <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                                <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                            </div>
		    		    </div>
                    </form>
                    <!-- End | Lost Password Form -->
                    
                    <!-- Begin | Register Form -->
                    <form id="register-form" style="display:none;">
            		    <div class="modal-body">
		    				
		    				<input id="register_username" class="form-control" type="text" placeholder="Username" required>
                            <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                            <input id="register_password" class="form-control" type="password" placeholder="Password" required>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-success btn-lg btn-block">Register</button>
                            </div>
                            <div>
                                <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                                <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                            </div>
		    		    </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
			</div>
		</div>
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
			   				 					<form action="" method="post" enctype="multipart/form-data">

			   						
              <div class="form-group">
                <label for="exampleInputEmail1">Task Title</label>
                <textarea   name="status_title" class="form-control" placeholder="eg:need a cleaner"></textarea>
                  
              </div>
              
              <div class="form-group">
                <label for="exampleInputPassword1">Describe your task in more detail</label>
         <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" name="status" required></textarea>
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
					<button type="submit" name="submit"  class="btn btn-default btn-hover-green" value="Post">Post</button>
				</div>
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
  
  
               
 <span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $userRow['name']; ?>
 
 </a>
 </li>
 <li>
 <a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
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
 

 
 </div>
 
 <!-- /#page-content-wrapper -->
 </div>
 </div>
 <!-- /#wrapper -->

  
  <!-- this is div for user post -->

	<div class="wrapper">		
		<!--content -->
		<div class="content">
			<!--left-content-->
			<div class="center">
				<div class="posts">
					<div class="create-posts">
						<?php foreach($post as $row){
							//fetching all posts
							$time_ago = $row['status_time'];
						echo '
						<div class="post-show">
									<div class="post-show-inner">
										<div class="post-header">
											<div class="post-left-box">
												<div class="id-img-box"><img src="'.$row['profile_image'].'"></img></div>
												<div class="id-name">
													<ul>
														'.$row['name'].'
														<li><small>'.$get->timeAgo($time_ago).'</small></li>
													</ul>
												</div>
											</div>
											<div class="post-right-box"></div>
										</div>
									
											<div class="post-body">
											<div class="post-header-text">
							 <a href="project_description.php?s_title=' . $row['status'] . '"> '.$row['status_title'].'
							  
							  </a>

											 <br></br>
												'.$row['status'].'
											</div>'.( ($row['status_image'] != 'NULL') ? '<div class="post-img">
												<img src="'.$row['status_image'].'"></img></div>' : '').'
											
										</div>
									</div>
								</div><br> ';	
					}	
				?>




</div>

</div>

</div>


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