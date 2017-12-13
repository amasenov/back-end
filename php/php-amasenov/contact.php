<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Questions?</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php
		//phpinfo();
		// define variables and set to empty values
		$name = $email = $message = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = validate_input($_POST["name"]);
		$email = validate_input($_POST["email"]);
		$message = validate_input($_POST["message"]);
		}
		function validate_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		}
		?>
		<!--Menu-->
		<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<a class="navbar-brand" href="#">Navbar</a>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="#" onclick="loadHome()">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" onclick="loadContact()">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" onclick="loadLogin()">Log in</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" onclick="loadRegister()">Register</a>
					</li>
				</ul>
			</div>
		</nav>
		<!--Form-->
		<div class="wrapper">
			<div class="container">
				<h1>Contact</h1>
				<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<input type="text" name="name" placeholder="Name" required/>
					<input type="email" name="email" placeholder="Email" required/>
					<textarea name="message" placeholder="Message" rows="5" cols="70" required></textarea>
					<button type="submit" name="submit">Submit</button>
				</form>
			</div>
			<?php
			$mailto="amasenov@outlook.com";
			$message = wordwrap($message,70,"<br>\n");
			//$headers = "Email: $email" . "\r\n";
			// send email
			if (isset($_POST["submit"])) {
				mail($mailto,$name,$message,$email);
			}
			?>
			<ul class="bg-bubbles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src="js/jquery.js"></script>
		<script>
		function loadRegister(){
		window.location.assign("register.html");
		}
		function loadLogin(){
		window.location.assign("login.html");
		}
		function loadContact(){
		window.location.assign("contact.php");
		}
		function loadHome(){
		window.location.assign("index.html");
		}
		</script>
	</body>
</html>