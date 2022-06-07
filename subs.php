<?php
    session_start();
?>
<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="ins1.css">
	<title>Insert Page page</title>
	<style>
</style>
</head>
<body>
    <div class="fn">
<center>
        	<div class="main">
        <div class="internal" style="text-align: left;border: 4px solid black;transform: translateY(+200px);">
	<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "FarmD";

    $conn = mysqli_connect($dbHost ,$dbUser ,$dbPass ,$dbName);

    if($conn) {
    $adharuid = strval($_SESSION['adharuid']);
    $dop= strval($_REQUEST['dop']);
    $wc=intval($_REQUEST['wc']);
    $sp=intval($_REQUEST['sp']);
    $ti=intval($_REQUEST['ti']);
    $tr=intval($_REQUEST['tr']);
    $npk=intval($_REQUEST['npk']);
    $bio=intval($_REQUEST['bio']);
    $fungal=intval($_REQUEST['fungal']);
    $viral=intval($_REQUEST['viral']);
    $total= intval($wc+$sp+$ti+$tr+$npk+$bio+$fungal+$viral);

$sql = "SELECT acc_num FROM Bank_Details WHERE adharuid='$adharuid'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>=1)
{
    while($row=mysqli_fetch_array($result))
    {
        $acc_num = $row['acc_num'];
    }
}

$statusMsg = '';
$targetDir = "/opt/lampp/htdocs/DBMS_Mini_Project/uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir.$fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // echo $targetFilePath;
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $sql= "INSERT INTO Application_Details (dop,weed_cutter,sprayer,tiller,tractor,npk,bio,fungal,viral,total,acc_num,bill) VALUES ('$dop',$wc,$sp,$ti,$tr,$npk,$bio,$fungal,$viral,$total,'$acc_num','$fileName')";
            // echo $sql;
    if(mysqli_query($conn,$sql)){

        $sql1="SELECT app_num FROM Application_Details WHERE acc_num=$acc_num";
        // echo $acc_num;
        $result = mysqli_query($conn,$sql1);
		if(mysqli_num_rows($result)>0)
		{
            while($row=mysqli_fetch_array($result))
			    $reference_id=$row['app_num'];
			echo "<b>SUCESSFULLY APPLIED</b><br><br>";
            echo "<b> YOUR APPLICATION ID: $reference_id</b>";

            $sql = "INSERT INTO Sanction_Details VALUES ($reference_id,'$acc_num','processing',0)";
            $result = mysqli_query($conn,$sql);

		}
		else{
			echo "no results";
		}
    }
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}
echo $statusMsg;
?>
 <form action="main.html" method="post">
              <center><input class="button" style="height: 40px;width: 150px;font-size: 20px;transform:translateY(50px)" type="submit" name="submit" value="Home Page"></center> <br><br>
            </form>
        </div>
    </div>
    </center>
</div>
</body>

</html>
