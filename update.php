<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE DETAILS</title>
    <link rel="stylesheet" href="style2_up.css">
    <?php
        $conn = mysqli_connect("localhost", "root", "", "FarmD");
		
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}

		$id = strval($_COOKIE['uid']);
		$sql1 = "SELECT firstname,lastname,email FROM Farmers_Deatils where adharuid='$id'";
        $sql2 = "SELECT acre,cents,family FROM Farmers_Land where adharuid='$id'";
		$result1 = mysqli_query($conn,$sql1);
        $result2 = mysqli_query($conn,$sql2);
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
            while($row = mysqli_fetch_array($result1))
            {
                $fn = $row['firstname'];
                $ln = $row['lastname'];
                $email = $row['email'];
            }
            while($row1 = mysqli_fetch_array($result2))
            {
                $acre = $row1['acre'];
                $cents = $row1['cents'];
                $family = $row1['family'];
            }
		}
        mysqli_close($conn);
    ?>
    <script>
        function pop() {
    let text;
    let person=parse_str(<?php echo $id;?>);
    if(person== null || person=="")
    {
      text=alert("Cancelled");
    }
    else {
      window.location.href="updation.php";
      document.cookie = "uid="+person;
    }
  }
    </script>
</head>
<body>
<div class="container">
    <div class="title"><div style="transform: translateX(70px); color:black;"><b>UPDATE PERSONAL DETAILS</b></div></div>
    <div class="content">
      <form action="updation.php" method="post">
		  <div class="user-details">
	      <div class="input-box">
		    <span class="details"><strong>First Name</strong></span>
	    	  <input type="chechbox" name="fn" value="<?php echo $fn;?>"><br>
	    </div>
      <div class="input-box">
		    <span class="details"><strong>last Name</strong></span>
	    	  <input type="chechbox" name="ln" value="<?php echo $ln;?>"><br>
	    </div>
      <div class="input-box">
		    <span class="details"><strong>Email-id</strong></span>
	    	  <input type="chechbox" name="emailid" value="<?php echo $email;?>"><br>
	    </div>
      <div class="input-box">
		    <span class="details"><strong>Land in Acre</strong></span>
	    	  <input type="chechbox" name="acre" value="<?php echo $acre;?>"><br>
	    </div>
      <div class="input-box">
		    <span class="details"><strong>Land in Cents</strong></span>
	    	  <input type="chechbox" name="cents" value="<?php echo $cents;?>"><br>
	    </div>
      <div class="input-box">
		    <span class="details"><strong>Total family members</strong></span>
	    	  <input type="chechbox" name="family" value="<?php echo $family;?>"><br>
	    </div>
      </div><br><br></div>
<br><br>
		<div class="wrap">
  <button class="button">Update</button>
</div>
</form>
</div>
</div>
</body>
</html>