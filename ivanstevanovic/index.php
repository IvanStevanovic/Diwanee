<?php include('operation.php'); ?>
<html>
	<head>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<div class="form">
			<form method="POST">
			<label for="username">USERNAME: </label><input type="text" id="username" name="username"/><br/><br/>
			<label for="password">PASSWORD: </label><input type="password" id="password" name="password"/><br/><br/>
			<input type="submit" value="LOGIN" name="login"/>
			<input type="submit" value="REGISTER" name="register"/>
			<br>
			<br>
			<li>Must start with letter</li>
			<li>3-15 characters</li>
			<li>Letters and numbers only</li>
			</form>
		</div>
		<div class="message">
		<?php
		
			if(isset($_POST["login"])){
				$username = $_POST["username"];
				$password = $_POST["password"];
				if(!empty($username) && !empty($password)){
					//check if regex match
					if(preg_match('/^[A-Za-z][A-Za-z0-9]{2,14}$/', $username) && preg_match('/^[A-Za-z][A-Za-z0-9]{2,14}$/', $password)){
						$user = new User();
						$user->setUsername($username);
						$user->setPassword($password);
						$user->login();
					}
					else{
						echo"<span class='spec'>USERNAME and PASSWORD </span><ul class='kec'><li>Must start with letter</li><li>3-15 characters</li><li>Letters and numbers only</li></ul>";
					}
;
				}	
				else{
					echo "Pleas do not leave empty fields!";
				}
			}
			
			if(isset($_POST["register"])){
				$username = $_POST["username"];
				$password = $_POST["password"];
				if(!empty($username) && !empty($password)){
					if(preg_match('/^[A-Za-z][A-Za-z0-9]{2,14}$/', $username) && preg_match('/^[A-Za-z][A-Za-z0-9]{2,14}$/', $password)){
					$user = new User();
					$user->setUsername($username);
					$user->setPassword($password);
					$user->register();
					}
					else{
						echo"<span>USERNAME and PASSWORD </span><ul><li>Must start with letter</li><li>3-15 characters</li><li>Letters and numbers only</li></ul>";
					}
				}	
				else{
					echo "Pleas do not leave empty fields!";
				}
			}
					
		?>
		</div>
	</body>
</html>