<?php 
$str=",1004,05,015,06";


if (!isset($_GET["q"])) die('err_1');//data count invalid
$q			= $_GET["q"];
if ($q=="") die('err_1');//data count invalid

$q			= explode(",",$q);

if(count($q)!=21) die("NACK".$str);//die('err_1');//data count invalid

$id			= $q[0];//imei

require './Controller/connection.php';

$sql = "SELECT id FROM _f_device where dev_id='".$id."' and active='1'";//device disabled
$result = $conn->query($sql);
if($result->num_rows > 0)
{
  while($row = $result->fetch_assoc())
  {
	$sql = "INSERT INTO `_g_data` (`device`, `v1`, `v2`, `v3`, `v4`, `v5`, `v6`, `v7`, `v8`, `v9`, `v10`, `v11`, `v12`, `v13`, `v14`, `v15`, `v16`, `v17`, `v18`, `v19`, `v20`) VALUES ('".$id."', '".$q[1]."', '".$q[2]."', '".$q[3]."', '".$q[4]."', '".$q[5]."', '".$q[6]."', '".$q[7]."', '".$q[8]."', '".$q[9]."', '".$q[10]."', '".$q[11]."', '".$q[12]."', '".$q[13]."', '".$q[14]."', '".$q[15]."', '".$q[16]."', '".$q[17]."', '".$q[18]."', '".$q[19]."', '".$q[20]."')";
	if ($conn->query($sql) === TRUE)
	  echo "PACK".$str;//echo "ok";
	else
	  echo "NACK".$str;
	  //echo "err_2";//can't access database server
  }
}
else
die("NACK".$str);//die('err_3');//invalid IMEI or device disabled

$conn->close();

//IMEI,B%,BV,BI,BP,SV,SI,SP,LV,LI,LP ,FullWorkingMinutes,halfWorkingMinutes,ConsumedEnergy,PacketType,ChangeFlagByte,StatusByte,ReservedData1,ReservedData2
//id  ,v1,v2,v3,v4,v5,v6,v7,v8,v9,v10,v11               ,v11               ,v12           ,v13       ,v14           ,v15       ,v16          ,v17

?>
