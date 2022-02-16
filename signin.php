<?php
ob_start();
include('dashboard/functions.php');

if (isset($_SESSION['username'])) {
	header("Location: index.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$User->signIn($email, $password);
	}
}
include('header.php');
?>
<div class="theform">
	<div>
		<img src="images/pexels-mister-mister-380782.jpg" alt="">
	</div>
	<form action="" method="POST">
		<h3>Welcome Back</h3>
		<input type="email" placeholder="Email" name="email" required>
		<input type="password" placeholder="Password" name="password" required>
		<button name="submit" class="btn">Login</button>
		<p>Don't have an account? <a href="register.php">Register Here</a>.</p>
	</form>

</div>
<?php
include('footer.php');
?>