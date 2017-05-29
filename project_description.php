

<?php
    
    
require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM registration WHERE usr_id=:usr_id");
	$stmt->execute(array(":usr_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
	$check  = new USER;
	$get    = new USER;
	$send   = new USER;
	$retrieve = new USER;
	$sends = new USER;

	
   
		
	//fetching user comment by post_id
	$commentts = $retrieve->user_comment($post_id);
		
	// fetching comments from database
	$cmnt  = $retrieve->comments();
	
	
	//check user fill  comment form
			 	 
			 if(isset($_POST['submit_comment'])){
		       $comment  = $_POST['comment'];
		
					$sends->add_comments($post_id,$user_id,$comment);
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
 <link rel="stylesheet" href="components/bootstrap/dist/css/postataskbox.css" />
 
    <link rel="stylesheet" href="components/bootstrap/dist/css/projectdes.css" />

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

   

 

 
 
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

 <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a></li>
 </ul>
 <form class="navbar-form navbar-right" action="" method="GET">
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
 
 
 
 <!--
<div class="center"><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">Post Task</button></div>
-->

 

 
 
 
 
 
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

  <div id="page-content-wrapper">
 <div class="container-fluid">
 <div class="row">
 <div class="col-lg-12">
 <br>

 </div>
 </div>
 <div class="row">
 <div class="col-lg-12">
     
      
<div class="container">
    <div class="col-sm-8">
        <div class="panel panel-white post panel-shadow">
            <div class="post-heading">
                <div class="pull-left image">
                    <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                </div>
                <div class="pull-left meta">
                    <div class="title h5">
                        <a href="#"><b></b></a>
                    
                    </div>
                </div>
            </div> 
            <div class="post-description"> 
              
               <?php
$title = $_GET['s_title'];
echo $title;
?>
             
   
          
                
            </div>
        	<form action="" method="post" enctype="multipart/form-data">

            <div class="post-footer">
                <div class="input-group"> 
                    <input class="form-control" placeholder="Add a comment" type="text" name="comment">
                   	<div class="btn-group" role="group">
					<button type="submit" name="submit_comment"  class="btn btn-default btn-hover-green" >submit</button>
				</div>
                </div>
                </form>
                
                	<?php foreach($cmnt as $comnt){
							//fetching all posts
							$time_ago = $comnt['comment_time'];
						echo '
                
                <ul class="comments-list">
                    <li class="comment">
                        <a class="pull-left" href="#">
                            <img class="avatar" src="http://bootdey.com/img/Content/user_1.jpg" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="user">	'.$comnt['name'].'</h4>
                                <h5 class="time">'.$get->timeAgo($time_ago).'</h5>
                            </div>
                            <p>'.$comnt['comment'].'</p>
                        </div>
                       
                    </li>
                
                </ul>
                
                ';	
					}	
				?>
                
            </div>
        </div>
    </div>
</div>
     
     
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