<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<title>FS Browser 1.0</title>
		<?php
			error_reporting(0);
			ini_set('display_errors', 0);
			//***START*** -> Image of the Day
			$day = date("j");
			$iday = file_get_contents("iotda.dat");
			$img = file_get_contents("iotdb.dat");
			$images = glob('img/*.jpg', GLOB_BRACE);
			shuffle($images);
			if ($day != $iday) {
				$img = $images[0];
				file_put_contents("iotda.dat", $day);
				file_put_contents("iotdb.dat", $img);
			}
			echo "<style>
				body  {
					background-image: url('$img');
					background-repeat: no-repeat;
					background-attachment: fixed;
					background-size:cover;
					background-position:center;
				}
			</style>";
			//*** END ***
		?>
		
		<style>	
			h1, h2, p, a {
				font-family: 'Roboto', sans-serif;
			}
		</style>
	</head>
	<body onload="pageloaded()" style="margin:0;">
	  <div class="container">
		<form method="GET" action="fsbrowser.php">
			  <div class="modal fade" id="loginModal" role="dialog">
				<div class="modal-dialog modal-bg">
				  <div class="modal-content">
					<div class="modal-header">
					  <h4 class="modal-title">Login</h4>
					</div>
					<div class="modal-body">
					  <div class="input-group" style="margin-bottom: 8px">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="usr" type="text" class="form-control" name="usr" placeholder="Username">
					  </div>
					  <div class="input-group" style="margin-bottom: 8px">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="pass" type="password" class="form-control" name="pass" placeholder="Password">
					  </div>
					</div>
					<input id="action" type="hidden" name="action" value="do_login">
					<div class="modal-footer">
					  <input type="submit" class="btn btn-default" onclick="doLogin();" value="Login">
					</div>
				  </div>
				</div>
			  </div>
		  </form>
		<script>
		var myVar;

		function pageloaded() {
			myVar = setTimeout(showPage, 500);
		}

		function showPage() {
		  showLogin();
		}
		
		function showLogin() {
		  $('#loginModal').modal('show');
		}
		function doLogin() {
		  $('#loginModal').modal('hide');
		}

		</script>
		</div>
	</body>
</html>
