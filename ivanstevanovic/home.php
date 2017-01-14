<html>
	<head>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<?php 
			include('operation.php'); 
			/* check if user is logged in /does isset sesions */
			if(isset($_SESSION["username"]) && isset($_SESSION["password"])){
		?>
		
		
		<div class="menu">
			<a href="home.php"> home </a>|
			<a href="?all"> all users </a>|
			<a href="?logout"> logout </a>
			<div>
			<?php 	
				if(!isset($_GET["logout"]) && !isset($_GET["all"])){
					echo "Hello ".$_SESSION["username"];
				}
			?>
			</div>
		</div>

		<div class="users">

		<?php
			/* Show all users by clicking on 'list all users' link */
			if(isset($_GET["all"])){
				$user = new User();
				$users = $user->returnAllUsers();
			?>
				<h2>All Users</h2>
				<table>
					<tr>
					    <th>Username</th>
						<th>Password</th>
						<th>Register Date</th>
					</tr>
			<?php
				foreach($users as $key => $user_data){
		?>
					<tr>
						<td><?php echo $user_data["username"];?></td>
						<td><?php echo $user_data["password"];?></td>
						<td><?php echo $user_data["created_date"];?></td>
					</tr>
		<?php   
				}
			}
			?>
			</table>
			
			<?php
			/* Loging out user by clicking on 'logout' link */ 
			if(isset($_GET["logout"])){
				session_destroy();
				header("Location:index.php");
			}

		
		?>
		</div>
		<?php 
			}
			/* if session doesn't exist (user is not logged) show content below */
			else{
				echo "You must be login if u wanna see this content. Please <a href='index.php'>Login</a>.";
				
			}
		?>
	</body>
</html>