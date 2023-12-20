<?php 
session_start();
require '../Controller/connection.php';
if( isSession("uid") && isSession("pass") )
{
$uid  = session("uid");
$pass = session("pass");
}
else
header("Location: index.php");

$sql = "SELECT name, branch, branch_value FROM login where uname='{$uid}' and pass='{$pass}' and type='1' and active=1";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
$row          = $result->fetch_assoc();
$name         = $row["name"];
$branch       = $row["branch"];
$branch_value = $row["branch_value"];
?>
<!DOCTYPE html>
<html>
<title>Dashboard | <?php echo $project_name; ?></title>
<meta charset="UTF-8">
<meta name="author" content="Manav Akela">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w4.css">
<script src="../js/w3.js"></script>
<script src="../js/script.js"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=<?php echo $font; ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!---favicon start--->
<link rel="apple-touch-icon-precomposed" href="../img/logo.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/logo.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/logo.png" />
<link rel="shortcut icon" href="../img/logo.png">
<!---favicon stop--->

<style>
html,body,h1,h2,h3,h4,h5,h6,h7 {font-family: "<?php echo $font; ?>", sans-serif}
.w3-color, .w3-hover-color:hover{color: #fff!important;background-color: #007cc2!important;}
.w3-text-color, .w3-hover-text-color:hover {color: #e67817!important;}
.bgimg-1 {
    background-attachment: fixed;
    background-position: top;
    background-repeat: no-repeat;
    background-size: cover;
    background-image: url('../img/bg.jpg');
    min-height: 100%;
}
.m8-fancy{ border-radius:16px; }
</style>
<body class="w3-light-grey">


<!-- Top container -->
<div class="bgimg-1 w3-bar w3-top w3-large w3-card-4 w3-animate-top" style="z-index:4;background-color:rgba(16,112,144,19%);background-position: top;color:#fef8f3;">
  <button class="w3-bar-item w3-button w3-hide-large w3-text-black w3-hover-none" style="margin-top:5px;" onclick="w3.toggleHide('#mySidebar,#myOverlay');"><i class="fa fa-bars"></i></button>
  <img src="../img/logo2.png" class="w3-bar-item w3-hide-small" style="background-color:#ffffff;height:75px;">
  <span class="w3-bar-item w3-hide-small w3-xxlarge" style="height:75px;padding-top:15px;padding-left:20px;"><b>Street Light RMS</b></span>
  <span class="w3-bar-item w3-hide-medium w3-hide-large" style="background-color:#fff;height:52px;padding-top:13px;"><b>Esharp IoT</b></span>
  <a href="../Controller/logout.php" class="w3-right w3-text-color w3-light-gray w3-button w3-hide-small" style="padding:24.1px;" title="Logout"><i class="fa fa-sign-out fa-fw"></i> <label class="w3-hide-medium">Logout</label></a>
  <span class="w3-hide-small w3-right w3-large w3-margin-left w3-margin-right" style="margin-top:24px;color:#fff;"><span>Welcome, <strong><?php echo $name; ?></strong></span></span>
  <span class="w3-bar-item0 w3-right w3-hide-small"><img src="../img/user4.png" style="height:75px;"></span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse0 w3-white w3-animate-left" style="z-index:3;width:300px;display:none;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="../img/user3.png" class="w3-circle w3-margin-right" style="width:50px">
    </div>
    <div class="w3-col s8 w3-bar0">
      <span>Welcome, <strong><?php echo $name; ?></strong></span><br>
      <a href="#" class="w3-bar-item w3-button w3-text-color"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button w3-text-color"><i class="fa fa-user"></i></a>
      <a href="../Controller/logout.php" class="w3-bar-item w3-button w3-text-red w3-hover-text-red"><i class="fa fa-sign-out"></i></a>
    </div>
  </div>
  <hr>
  <!---<div class="w3-container">
    <h5>Dashboard</h5>
  </div>--->
  <div class="w3-bar-block">
    <a href="?item=1" class="w3-bar-item w3-button w3-padding" id="item_1"><i class="fa fa-dashboard fa-fw"></i>&nbsp; Dashboard</a>
    <a href="?item=2" class="w3-bar-item w3-button w3-padding" id="item_2"><i class="fa fa-table fa-fw"></i>&nbsp; Device List</a>
    <a href="?item=3" class="w3-bar-item w3-button w3-padding" id="item_3"><i class="fa fa-users fa-fw"></i>&nbsp; Manage User</a>
    <a href="?item=4" class="w3-bar-item w3-button w3-padding" id="item_4"><i class="fa fa-microchip fa-fw"></i>&nbsp; Manage Device</a>
    <a href="?item=5" class="w3-bar-item w3-button w3-padding" id="item_5"><i class="fa fa-cog fa-fw"></i>&nbsp; Settings</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3.hide('#mySidebar,#myOverlay');" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<?php require "./hiddenElements.php"; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:0.300px;margin-top:0px;">

<div class="w3-bar w3-card-4 w3-text-white w3-hide-small w3-hide-medium" style="background-color:#e67817;">
  <div class="w3-bar-item w3-hover-color w3-button" id="item2_1" onclick="window.location.assign('?item=1')"><i class="fa fa-dashboard fa-fw"></i>&nbsp; Dashboard</div>
  <div class="w3-bar-item w3-hover-color w3-button" id="item2_2" onclick="window.location.assign('?item=2')"><i class="fa fa-table fa-fw"></i>&nbsp; Device List</div>
  <div class="w3-bar-item w3-hover-color w3-button" id="item2_3" onclick="window.location.assign('?item=3')"><i class="fa fa-users fa-fw"></i>&nbsp; Manage User</div>
  <div class="w3-bar-item w3-hover-color w3-button" id="item2_4" onclick="window.location.assign('?item=4')"><i class="fa fa-microchip fa-fw"></i>&nbsp; Manage Device</div>
  <div class="w3-bar-item w3-hover-color w3-button" id="item2_5" onclick="window.location.assign('?item=5')"><i class="fa fa-cog fa-fw"></i>&nbsp; Settings</div>
</div>

  <?php 
  $item = get("item");
  if($item=="1")
  require "./admin/dashboard.php";
  else if($item=="2")
  require "./admin/history.php";
  else if($item=="3")
  require "./admin/manageUser.php";
  else if($item=="4")
  require "./admin/manageDevice.php";
  else if($item=="5")
  require "./admin/settings.php";
  else if($item=="6")
  require "./admin/log.php";
  else if($item=="7")
  require "./admin/faultyList.php";
  else 
  require "./admin/dashboard.php";
  ?>

  <footer class="w3-container w3-padding-16 w3-light-grey">
    <p class="w3-left"><?php echo $project_name; ?> @ 2023</p>
    <p class="w3-right">Powered by <a href="https://esharpiot.com/" target="_blank">Esharp</a></p>
  </footer>
</div>

<script>
<?php 
if(isGet("item")) 
{
echo 'w3.addClass("#item_'.get("item").'", "w3-color");';
echo 'w3.addClass("#item2_'.get("item").'", "w3-color");';
}
if(get("item")=="6")
echo "onStart();";
?>
</script>

</body>
</html>

<?php 
}
else
{
session_unset();
session_destroy();
header("Location: ./index.php?err");
}
?>