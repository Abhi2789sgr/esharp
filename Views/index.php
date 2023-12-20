<?php 
session_start();
require '../Controller/connection.php';
if( isSession("type") && isSession("uid") && isSession("pass") )
header("Location: ../Controller/login.php");
?>
<!DOCTYPE html>
<html translate="no">
<title>Login | <?php echo $project_name; ?></title>
<meta charset="UTF-8">
<meta name="author" content="Manav Akela">
<meta name="google" content="notranslate">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w4.css">
<script src="../js/script.js"></script>

<link href='https://fonts.googleapis.com/css?family=<?php echo $font; ?>' rel='stylesheet'>

<!---favicon start--->
<link rel="apple-touch-icon-precomposed" href="../img/logo.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/logo.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/logo.png" />
<link rel="shortcut icon" href="../img/logo.png">
<!---favicon stop--->

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "<?php echo $font; ?>", sans-serif;}
body, html {
    height: 100%;
    color: #777;
    line-height: 1.8;
}
.bgimg-1 {
    background-attachment: fixed;
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url('../img/bg.jpg');
    min-height: 100%;
}
</style>
<?php 
//background-color: #003769;//#ff9800;//
?>
<body class="bgimg-1">

<div class="w3-bar w3-top w3-large w3-card-4 w3-animate-zoom" style="z-index:4;background-color:rgba(16,112,144,19%);color:#fef8f3;">
  <img src="../img/logo2.png" class="w3-bar-item w3-hide-small" style="background-color:#ffffff;height:75px;">
  <span class="w3-bar-item w3-hide-small w3-xxlarge" style="height:75px;padding-top:10px;padding-left:20px;"><b>Street Light RMS</b></span>
  <span class="w3-bar-item w3-hide-medium w3-hide-large" style="background-color:#fff;height:52px;padding-top:10px;"><b>Esharp IoT</b></span>
  <!---<span class="w3-hide-small w3-right w3-xlarge w3-margin-right" style="margin-top:15px;color:#fff;">मुख्यमंत्री ग्रामीण सोलर स्ट्रीट लाइट योजना</span>--->
</div>

<div class="w3-display-container" style="height:600px;margin-top:50px;">
    <div class="w3-display-middle" style="padding-top:80px;">
		<div class="w3-panel w3-card w3-round-large w3-text-white w3-center w3-animate-bottom" style="background-color:rgba(16,112,144,56%);width:400px;">
			<img src="../img/user.png" alt="Avatar" style="min-width:100px;width:15%;margin:25px 0px 25px 0px;" class="w3-circle">
			<form class="" action="../Controller/login.php" method="POST">
				<div class="w3-section">
					<label><b>Login Type</b></label><br>
					<div class="w3-row w3-margin-bottom">
						<div class="w3-col s4 m4 l4">
							<input class="w3-radio" type="radio" name="type" value="1" checked0>
							<label>Master</label>
						</div>
						<div class="w3-col s4 m4 l4">
							<input class="w3-radio" type="radio" name="type" value="2">
							<label>Admin</label>
						</div>
						<div class="w3-col s4 m4 l4">
							<input class="w3-radio" type="radio" name="type" value="4">
							<label>User</label>
						</div>
					</div>
					<label><b>User ID</b></label>
					<input class="w3-input w3-border w3-margin-bottom w3-round-large" type="text" placeholder="Enter User ID" name="uid" required>
					<label><b>Password</b></label>
					<input class="w3-input w3-border w3-margin-bottom w3-round-large" type="password" placeholder="Enter Password" name="pass" required>
					<button class="w3-button w3-green w3-hover-grey w3-round-large w3-margin-top w3-center" style="width:99%;" type="submit">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php require "./hiddenElements.php"; ?>

<script><?php if(isGet("err")) echo 'msg("Username or password missmatch");' ?></script>

</body>
</html>
