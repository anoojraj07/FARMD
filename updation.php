<!DOCTYPE html>
<html>

<head>
	<title>Updation</title>
	<?php
		$conn = mysqli_connect("localhost", "root", "", "FarmD");
		
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

		$adharuid= strval($_COOKIE['uid']);
        $fn=strval($_REQUEST['fn']);
        $ln=strval($_REQUEST['ln']);
        $email=strval($_REQUEST['emailid']);
        $acre=intval($_REQUEST['acre']);
        $cents=intval($_REQUEST['cents']);
        $family=intval($_REQUEST['family']);

		$sql1 = "SELECT * FROM Farmers_Deatils where adharuid='$adharuid'";
        $sql2 = "SELECT * FROM Farmers_Land where adharuid='$adharuid'";
        $result2 = mysqli_query($conn,$sql2);
		$result1 = mysqli_query($conn,$sql1);
		if(mysqli_num_rows($result1)<=0)
		{
            echo '<script type="text/javascript" language="javascript">
            if(confirm("ID DOESNOT EXIST! PLEASE REGISTER!"))
            {
                self.location="registration.html";
            }
            </script> ';
            exit();
		}
		else{
			// $sql1 = "UPDATE Farmers_Deatils SET firstname='$fn', lastname='$ln', email='$email' WHERE adharuid='$adharuid'";
            // $sql2 = "UPDATE Farmers_Land SET acre=$acre, cents=$cents, family=$family WHERE adharuid='$adharuid'";
            // if(mysqli_query($conn, $sql1) && mysqli_query($conn,$sql2)){

            //     echo '<script type="text/javascript" language="javascript">
            //     if(confirm("UPDATION SUCCESSFULL!"))
            //     {
            //         self.location="post_login.php";
            //     }
            //     </script> ';
                
            // } 
           
                if(mysqli_query($conn,"CALL update_farmer_detail('$adharuid','$fn','$ln','$email')") && mysqli_query($conn,"CALL update_farmer_land('$adharuid',$acre,$cents,$family)"))
                {
                    echo '<script type="text/javascript" language="javascript">
                if(confirm("UPDATE SUCCESSFULL!"))
                {
                    self.location="post_login.php";
                }
                </script> ';
                }
               
        
                
            
            else{
                
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
		}
		mysqli_close($conn);


        ?>	
</head>

<body>
	<center>
		

		
		
	</center>
</body>

</html>

