<?php
include('../butuh/hubung.php');
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

    <title>Sign in</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<?php
	//fungsi kalau session sudah ada
	session_start();
	if(isset($_SESSION['username'])) {
		header('location: /admin/dashboard');
		//echo 'anda sudah login';
	}

	if(isset($_POST['kirim'])){
		//menangkap POST dari form login 		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//untuk mencegah sql injection
		//kita gunakan mysql_real_escape_string
		require_once('../butuh/fungsi.php');
		$username = cek($username);
		$password = cek($password);
		
		//require_once('../butuh/hubung.php');
		$query = mysql_query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
		$result = mysql_num_rows($query);
		$hasil = mysql_fetch_array($query);
		if($result == 1) {
			$_SESSION['username'] = $hasil['username'];
			header('location: /admin/dashboard');
		//echo "Username Belum Terdaftar!";
		//echo "<a href="login.php">« Back</a>";
		} else {
			//if($password != $hasil['password']) {
				//echo "Password Salah!";
				//echo '<a href="login.php">&amp;amp;laquo; Back</a>';
			//} else {
				//$_SESSION['username'] = $hasil['username'];
				//header('location:index.php');
				echo "Username Belum Terdaftar!";
			//}
		}
		//session_start();
	//if(!isset($_SESSION['username'])) {
		//header('location:login.php');
	//}else{		//$username = $_SESSION['username'];
	//}
		//require_once('../butuh/hubung.php');
	//$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
	//$hasil = mysql_fetch_array($query);
	}
?>

    <div class="container">

      <form class="form-signin" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
 	       </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="kirim">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
