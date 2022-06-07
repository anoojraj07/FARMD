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
		$adharuid = $_REQUEST['adharuid'];

        $password = $_REQUEST['password'];
        $_SESSION['adharuid'] = $adharuid;
        $retr = "SELECT * FROM Farmers_Deatils where adharuid='$adharuid'";
		$result = mysqli_query($conn,$retr);
		if(mysqli_num_rows($result))
		{
			$sql = "SELECT pass FROM Farmers_Deatils where adharuid='$adharuid'";
            $result = mysqli_query($conn ,$sql);
            $row = mysqli_fetch_array($result);
            if(password_verify($password, $row['pass']))
            {
                echo '<script type="text/javascript" language="javascript">
                if(confirm("SUCCESSFULLY LOGGED IN!!!"))
                {
                    self.location="post_login.php";
                }
                </script> ';
            }
            else{
                echo '<script type="text/javascript" language="javascript">
                if(confirm("INCORRECT CREDENTIALS!!!"))
                {
                    self.location="login.html";
                }
                </script> ';
                exit();
            }
		}
		else{
            echo '<script type="text/javascript" language="javascript">
            if(confirm("USERNAME DOES NOT EXIST!!PLEASE REGISTER"))
            {
                self.location="registration.html";
            }
            </script> ';
			exit();
		}
		mysqli_close($conn);
		?>
	</center>
</body>

</html>