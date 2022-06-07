<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="ins1.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPLICATION STATUS</title>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "FarmD");
		
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    $app_num = $_COOKIE['uid'];

    // echo $app_num;
    $sql = "SELECT * FROM Sanction_Details where app_num=$app_num";
    // echo $sql;
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result))
        {
            $status = $row['status'];
        }
        // echo $status;
    }
    else{
        echo '<script type="text/javascript" language="javascript">
            if(confirm("APPLICATION ID DOES NOT EXIST!!PLEASE APPLY FOR AVAILING SUBSIDY"))
            {
                self.location="Subsidy.html";
            }
            </script> ';
            exit();
    }
?>
</head>
<body>
<center>
<div class="main" >
    <div  class="internal" style="text-align: left;border: 4px solid black;transform: translateY(+200px);height: 300px;">

        <h1>TO THOSE WHO WORK IN ACRES, NOT IN HOURS<BR>WE THANK YOU</h1>
    <br><br><Br>
    <h1 style="background-color: rgb(192,192,192);">THE BILL IS <?php echo strtoupper($status); ?></h1>

    </div>
</div>
</center>
</body>
</html>
