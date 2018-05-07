<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			
			.file {
				text-align: justify;
				width: 80px;
				height: 96px;
				display: inline-block;
				padding: 8px;
				margin: 8px;
				overflow: hidden;
				border-radius: 8px;
				background: rgba(255,255,255,0.4);
			}

			i {
				display: block;
				margin: 0px auto;
				width: 48px;
				height: 48px;
				padding-right: 16px;
				padding-left: 16px;
			}
			
			p {
				word-wrap:break-word;
			}
			
			h1, h2, p, a, h4 {
				font-family: 'Roboto', sans-serif;
				text-shadow: 0px 0px 6px #DDDDDD, -1px -1px #DDDDDD, 1px 1px #DDDDDD;
			}
			
			a {
			  color:inherit;
			  text-decoration: none;
			}
			
			/* Center the loader */
			#loader {
			  position: absolute;
			  left: 50%;
			  top: 50%;
			  z-index: 1;
			  width: 150px;
			  height: 150px;
			  margin: -75px 0 0 -75px;
			  border: 16px solid rgba(0,0,0,0);
			  border-radius: 50%;
			  border-top: 16px solid #9FA25B;
			  width: 120px;
			  height: 120px;
			  -webkit-animation: spin 2s linear infinite;
			  animation: spin 2s linear infinite;
			}

			@-webkit-keyframes spin {
			  0% { -webkit-transform: rotate(0deg); }
			  100% { -webkit-transform: rotate(360deg); }
			}

			@keyframes spin {
			  0% { transform: rotate(0deg); }
			  100% { transform: rotate(360deg); }
			}

			/* Add animation to "page content" */
			.animate-bottom {
			  position: relative;
			  -webkit-animation-name: animatebottom;
			  -webkit-animation-duration: 1s;
			  animation-name: animatebottom;
			  animation-duration: 1s
			}

			@-webkit-keyframes animatebottom {
			  from { bottom:-100px; opacity:0 } 
			  to { bottom:0px; opacity:1 }
			}

			@keyframes animatebottom { 
			  from{ bottom:-100px; opacity:0 } 
			  to{ bottom:0; opacity:1 }
			}

			#centerDiv {
			  text-align: center;
			  width: 100%;
			  margin-left: auto;
			  margin-right: auto;
			}
			
			#myDiv {
			  display: none;
			  float: left;
			  width: 100% !important; 
			}
			
			.scrollbar {
				background-color: rgba(0,0,0,0);
				float: left;
				height: 100%;
				margin-bottom: 0px;
				margin-left: 0px;
				margin-top: 0px;
				width: 100%;
				overflow-y: scroll;
			}
			
			#style-1::-webkit-scrollbar {
				width: 6px;
				background-color: rgba(0,0,0,0);
			} 
			
			#style-1::-webkit-scrollbar-track {
				background-color: rgba(0,0,0,0);
			}
			
			#style-1::-webkit-scrollbar-thumb {
				background-color: #9FA25B;
				border-radius: 8px;
			}
			
		</style>
	</head>
	<body onload="pageloaded()" style="margin:0;">
		<div class="scrollbar" id="style-1">
			<div id="loader"></div>
			<div id="centerDiv">
				<div style="display:none;" id="myDiv" class="animate-bottom">
					<?php
					session_start(); 
					unset($_SESSION["user"]);
					unset($_SESSION["pass"]);
					echo "<h1>Logged out</h1><br><h2><a href='/'>Go Back</a></h2>";
					?>
					<center><h4>Copyright <?php echo date("Y"); ?> - Lukas Schmid</h4></center>
					<script>
					var myVar;

					function pageloaded() {
						myVar = setTimeout(showPage, 500);
					}

					function showPage() {
					  document.getElementById("loader").style.display = "none";
					  document.getElementById("myDiv").style.display = "inline";
					}
					</script>
				</div>
			</div>
		</div>
	</body>
</html>
