<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
.button-27 {
  appearance: none;
  background-color: #000000;
  border: 2px solid #1A1A1A;
  border-radius: 15px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 16px;
  font-weight: 600;
  line-height: normal;
  margin: 0;
  min-height: 60px;
  min-width: 0;
  outline: none;
  padding: 16px 24px;
  text-align: center;
  text-decoration: none;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 100%;
  will-change: transform;
}

.button-27:disabled {
  pointer-events: none;
}

.button-27:hover {
  box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
  transform: translateY(-2px);
}

.button-27:active {
  box-shadow: none;
  transform: translateY(0);
}
    </style>
  
</head>
<body>
    <h1 style="text-align:center;color:white;padding:6px;font-size:30px;background-color:rgb(53,52,52); font-size:40px;">Forms/Details of all Farmers Who Have Applied For Subsidy</h1>
    <?php
         $conn = mysqli_connect("localhost", "root", "", "FarmD");
        
         if($conn === false){
             die("ERROR: Could not connect. "
                 . mysqli_connect_error());
         }
         $mail = $_SESSION['admin_mail'];
         $password = $_SESSION['admin_pass'];
         $sqla = "SELECT * FROM admin WHERE mail='$mail' AND password='$password'";
        //  echo $sqla;
         $resulta = mysqli_query($conn,$sqla);
         if(mysqli_num_rows($resulta)<=0)
         {
            echo '<script type="text/javascript" language="javascript">
            if(confirm("Login Failed!!"))
            {
                self.location="Admin_login.html";
            }
            </script> ';
         } 
         $app_num = array();
         $acc_num = array();
         $status = array(); 
         $i=0;
         $sql = "SELECT * FROM Sanction_Details where status='processing'";
         $result = mysqli_query($conn,$sql);
         if(mysqli_num_rows($result)>0){
             while($row = mysqli_fetch_array($result)){

                 $app_num[$i] = $row['app_num'];
                 $acc_num[$i] = $row['acc_num'];
                 $status[$i] = $row['status'];
                //  echo $app_num[$i]."\t".$acc_num[$i]."\t".$status[$i]."<br>";
                 $i++;
             }
            //  echo count($app_num);
            echo "<table style='text-align:center;'><tr style='background-color:rgb(192,192,192);' ><th style='border-right:3px solid black;'>DATE OF PURCHASE</th><th style='border-right:3px solid black;'>WEED CUTTER</th><th style='border-right:3px solid black;'>SPRAYER</th><th style='border-right:3px solid black;'>TILLER</th><th style='border-right:3px solid black;'>TRACTOR</th><th style='border-right:3px solid black;'>NPK FERTILIZER</th><th style='border-right:3px solid black;'>BIO FERTILIZER</th><th style='border-right:3px solid black;'>FUNGAL PESTICIDE</th><th style='border-right:3px solid black;'>VIRAL PESTICIDE</th><th style='border-right:3px solid black;'>TOTAL AMOUNT</th><th style='border-right:3px solid black;'>UPLOADED BILL</th></tr>";
             for($i=0;$i<count($app_num);$i++)
             {
                $sql1 = "SELECT dop,weed_cutter,sprayer,tiller,tractor,npk,bio,fungal,viral,total,bill FROM Application_Details where app_num=$app_num[$i]";
                $result1 = mysqli_query($conn,$sql1);
                while($res = mysqli_fetch_array($result1))
                {
                    $dop = $res['dop'];
                    $weed_cutter = $res['weed_cutter'];
                    $sprayer = $res['sprayer'];
                    $tiller = $res['tiller'];
                    $tractor = $res['tractor'];
                    $npk = $res['npk'];
                    $bio = $res['bio'];
                    $fungal = $res['fungal'];
                    $viral = $res['viral'];
                    $total = $res['total'];
                    $bill = $res['bill'];
                }
                $url = 'uploads/'.$bill;
                echo "<form action='confirm.php' method='post'><tr><td style='border-right:3px dotted black;'>$dop</td><td style='border-right:3px dotted black;'>$weed_cutter</td><td style='border-right:3px dotted black;'>$sprayer</td><td style='border-right:3px dotted black;'>$tiller</td><td style='border-right:3px dotted black;'>$tractor</td><td style='border-right:3px dotted black;'>$npk</td><td style='border-right:3px dotted black;'>$bio</td><td style='border-right:3px dotted black;'>$fungal</td><td style='border-right:3px dotted black;'>$viral</td><td style='border-right:3px dotted black;'>$total</td><td style='border-right:3px dotted black;'><img src='$url' style='height:350px; width:350px;'></td><input type='hidden' name='app_num' value='$app_num[$i]' ><td><input type='submit' name='sanctioned' value='sanction subsidy' onclick='check()' class='button-27'></td><td><input type='submit' name='not_sanctioned' value='Not Sanctionable' onclick='check()' class='button-27'></td></tr></form>";
                echo "<tr>";
                echo "<td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td><td><hr></td>";
                echo "</tr>";
             }
             echo "</table>";
         }
         else
         {  
             echo "<center><h1>ALL FORMS ARE VALIDATED!!</h1></center>";
         }
    ?>
</body>
</html>