<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($uname,$umail,$upass)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO registration(name,email,password) 
		                                               VALUES(:uname, :umail, :upass)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($uname,$umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT usr_id, name,email,password FROM registration WHERE name=:uname OR email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['password']))
				{
					$_SESSION['user_session'] = $userRow['usr_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
	
	
		//fetching posts from database
		public function posts(){
			$stmt = $this->conn->prepare("SELECT * FROM `posts`,`registration` WHERE usr_id = usr_id_p ORDER BY `post_id` DESC");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		



	//fetching comment from database
		public function comments(){
			$stmt = $this->conn->prepare("SELECT * FROM `comments`,`posts` WHERE usr_id_p = user_id_c ORDER BY `comment_id` DESC");
			$stmt->execute();
			return $stmt->fetchAll();
		}




	//add new post if user comments 
		public function add_comments($post_id,$user_id,$comment){
			
		$stmt = $this->conn->prepare('INSERT INTO `comments` (`comment_id`, `post_id_c`, `user_id_c`, `comment`, `comment_time`) VALUES (NULL, ?, ?, ?,  CURRENT_TIMESTAMP)');
			$stmt->bindValue(1,$post_id);
		    $stmt->bindValue(2,$user_id);
		   $stmt->bindValue(3,$comment);
		   			$stmt->execute();

			header('Location: project_description.php');
		}
		
		
	

		//add new post if user post 
		public function add_post($user_id,$status_title,$status,$file_parh){
		
			if(empty($file_parh)){
				$file_parh = 'NULL';
			}
		$stmt = $this->conn->prepare('INSERT INTO `posts` (`post_id`, `usr_id_p`, `status_title`,`status`, `status_image`, `status_time`) VALUES (NULL, ?, ?, ?,?,  CURRENT_TIMESTAMP)');
			$stmt->bindValue(1,$user_id);
		    $stmt->bindValue(2,$status_title);
            $stmt->bindValue(3,$status);
			$stmt->bindValue(4,$file_parh);
			$stmt->execute();
			header('Location: home.php');
		}
		
		
		
		//fetch user comment by post_id
			public function user_comment($post_id){
		
			$stmt = $this->conn->prepare('SELECT * FROM posts WHERE post_id = ?');
			$stmt->bindvalue(1,$post_id);
			$stmt->execute();

			return $stmt->fetch();
		}
		
		
		
		
		//fetch user data by user id 
		public function user_data($user_id){
		
			$stmt = $this->conn->prepare('SELECT * FROM registration WHERE usr_id = ?');
			$stmt->bindvalue(1,$user_id);
			$stmt->execute();

			return $stmt->fetch();
		}
		
		
		
		
		//timeAgo Function
		public function timeAgo($time_ago){

			$time_ago = strtotime($time_ago);
			$cur_time   = time();
			$time_elapsed   = $cur_time - $time_ago;
			$seconds    = $time_elapsed ;
			$minutes    = round($time_elapsed / 60 );
			$hours      = round($time_elapsed / 3600);
			$days       = round($time_elapsed / 86400 );
			$weeks      = round($time_elapsed / 604800);
			$months     = round($time_elapsed / 2600640 );
			$years      = round($time_elapsed / 31207680 );
			// Seconds
			if($seconds <= 60){
			    return "just now";
			}
			//Minutes
			else if($minutes <=60){
			    if($minutes==1){
			        return "one minute ago";
			    }
			    else{
			        return "$minutes minutes ago";
			    }
			}
			//Hours
			else if($hours <=24){
			    if($hours==1){
			        return "an hour ago";
			    }else{
			        return "$hours hrs ago";
			    }
			}
			//Days
			else if($days <= 7){
			    if($days==1){
			        return "yesterday";
			    }else{
			        return "$days days ago";
			    }
			}
			//Weeks
			else if($weeks <= 4.3){
			    if($weeks==1){
			        return "a week ago";
			    }else{
			        return "$weeks weeks ago";
			    }
			}
			//Months
			else if($months <=12){
			    if($months==1){
			        return "a month ago";
			    }else{
			        return "$months months ago";
			    }
			}
			//Years
			else{
			    if($years==1){
			        return "one year ago";
			    }else{
			        return "$years years ago";
			    }
			}
		}
}
?>