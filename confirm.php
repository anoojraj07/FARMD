<?php
     $conn = mysqli_connect("localhost", "root", "", "FarmD");
        
     if($conn === false){
         die("ERROR: Could not connect. "
             . mysqli_connect_error());
     }
     
     if(isset($_POST['sanctioned']))
     {
    
         $status = "sanctioned";
         $app_num = $_POST['app_num'];
     }
     else
     {
       
        $status = "not sanctioned";
        $app_num = $_POST['app_num'];
        // echo $status;
     }
     
     $sql = "UPDATE Sanction_Details SET status='$status' WHERE app_num=$app_num";

     if($status=="not sanctioned")
     {
    
        $sql1 = "UPDATE Sanction_Details SET amount_sanctioned=0 WHERE app_num=$app_num";
        $res = mysqli_query($conn,$sql1);

     }

     if(mysqli_query($conn,$sql))
     {
        echo '<script type="text/javascript" language="javascript">
        if(confirm("Status Succesfully Updated!!"))
        {
            self.location="admin.php";
        }
        </script> ';
     }
?>