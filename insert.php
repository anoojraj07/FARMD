<?php
	session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "FarmD");
		
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		// $adharuid = mysql_real_escape_string($_GET['adharuid']);
		$adharuid = $_POST['adharuid'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = strval($_POST['email']);
        $rationcard = intval($_POST['rationcard']);
        $family = intval($_POST['family']);
        $acre = intval($_POST['acre']);
		$gender = $_POST['option'];
        $cents = intval($_POST['cents']);
        $accountnumber = intval($_POST['accountnumber']);
		$bank_name= $_POST['bank_name'];
        $ifsccode = $_POST['ifsccode'];
        $password = $_POST['pass'];
        $confpass = $_POST['confpass'];

		$_SESSION['adharuid'] = $adharuid;

		if($password != $confpass)
		{
			echo '<script type="text/javascript" language="javascript">
            if(confirm("PASSWORDS DO NOT MATCH!!"))
            {
                self.location="registration.html";
            }
            </script> ';
			exit();
		}
		else{
		$retr = "SELECT * FROM Farmers_Deatils where adharuid='$adharuid'";
		$result = mysqli_query($conn,$retr);
		if(mysqli_num_rows($result))
		{
			echo '<script type="text/javascript" language="javascript">
            if(confirm("USERNAME ALREADY EXISTS!!PLEASE LOGIN"))
            {
                self.location="login.php";
            }
            </script> ';
			exit();
		}
		else{

			$pass = password_hash($password,PASSWORD_DEFAULT);
			$sql = "INSERT INTO Farmers_Deatils (adharuid ,firstname ,lastname ,gender ,email ,pass) VALUES ('$adharuid',
			'$firstname','$lastname','$gender','$email','$pass')";
			
			$sql1 = "INSERT INTO Farmers_Land (adharuid ,acre ,cents ,family ,rationcard)VALUES ('$adharuid',
			$acre,$cents,$family,$rationcard)";	

			$sql2 = "INSERT INTO Bank_Details (adharuid ,bank_name ,acc_num ,ifsc)VALUES ('$adharuid',
			'$bank_name','$accountnumber','$ifsccode')";	
			if(mysqli_query($conn, $sql) && mysqli_query($conn ,$sql1) && mysqli_query($conn ,$sql2)){
				echo '<script type="text/javascript" language="javascript">
				if(confirm("SUCCESSFULLY REGISTERED"))
				{
					self.location="post_login.php";
				}
				</script> ';
			} else{
			
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
			}
		}
	}
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
