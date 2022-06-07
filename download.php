<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table {
    border-collapse: collapse;
}

td {
    padding-top: .5em;
    padding-bottom: .5em;
}
p {
    position:  relative;
  left: 650px;
}
    </style>
    <script>
        function cook() {
        let text;
        let person = parse_str(<?php echo $adharuid;?>);
        if(person== null || person=="")
        {
            text=alert("Cancelled");
        }
        else {
            window.location.href="pdf.php";
            document.cookie = "uid="+person;
        }
      }
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Your Sanction Form</title>
    <?php
        $conn = mysqli_connect("localhost", "root", "", "FarmD");
        
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        $app_num = $_COOKIE['uid'];
        setcookie("uid",false);
        $sql1 = "SELECT status FROM Sanction_Details WHERE app_num=$app_num";
        $result1 = mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result1)>0){
            while($res = mysqli_fetch_array($result1))
                $status = $res['status'];
            if($status == "sanctioned")
            {
                $sql = "SELECT a.total,b.acc_num,b.adharuid,b.bank_name,b.ifsc FROM Application_Details a ,Bank_Details b WHERE a.app_num = $app_num AND a.acc_num=b.acc_num";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result))
                {
                    $total = $row['total'];
                    $acc_num = $row['acc_num'];
                    $adharuid = $row['adharuid'];
                    $bank_name = $row['bank_name'];
                    $ifsc = $row['ifsc'];
                }
                $sql2 = "SELECT amount_sanctioned FROM Sanction_Details WHERE acc_num='$acc_num'";
                $result = mysqli_query($conn,$sql2);
                while($row = mysqli_fetch_array($result))
                    $amount_sanctioned = $row['amount_sanctioned'];
                $sql3 = "SELECT firstname,lastname FROM Farmers_Deatils WHERE adharuid='$adharuid'";
                $result = mysqli_query($conn,$sql3);
                while($row = mysqli_fetch_array($result))
                {
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                }
                $_SESSION["total"] = $total;
                // $_SESSION["acc_num"] = $acc_num;
                $_SESSION["adharuid"] = $adharuid;
                $_SESSION["bank_name"] = $bank_name;
                $_SESSION["ifsc"] = $ifsc;
                $_SESSION["first_name"] = $firstname;
                $_SESSION["last_name"] = $lastname;
                $_SESSION["amount_sanctioned"] = $amount_sanctioned;
                $_SESSION["acc_num"] = $acc_num;

            }
            else{
                echo '<script type="text/javascript" language="javascript">
                if(confirm("SUBSIDY NOT YET SANCTIONED!!"))
                {
                    self.location="post_login.php";
                }
                </script> ';
            }
}
    ?>
</head>
<body style="font-size:180%;">
<center><h1><img src="brand.jpg" width="100" height="90"></img>Subsidy Sanction Confirmation Bill<h1></center>
    <div>
        <div>
        <center>
        <script>
                    let quote = ["Let us not forget that the cultivation of the earth is the most important labor of man. When tillage begins, other arts follow. The farmers, therefore, are the founders of human civilization.","Farming looks mighty easy when your plow is a pencil and you’re a thousand miles from the cornfield.","Agriculture is our wisest pursuit because it will in the end contribute most to real wealth, good morals, and happiness.","The ultimate goal of farming is not the growing of crops, but the cultivation and perfection of human beings.","Agriculture is the noblest of all alchemy; for it turns earth, and even manure, into gold, conferring upon its cultivator the additional reward of health.","Farming is a profession of hope."]
                    var final = quote[Math.floor(Math.random() * quote.length)]
                    document.write(final);
                </script><br><br>
            <form action="pdf.php" method="post">
                <table border="5px"  styles="border-collapse: separate; border-spacing: 0 15px; text-align:center;">
                    <tr>
                        <th style="font-size:180%;"><b>SL.NO</b></th>
                        <th style="font-size:180%;"><b>Attribute</b></th>
                        <th style="font-size:180%;"><b>Value</b></th>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>1.</b></td>
                        <td style="text-align: center;"><b>Name</b></td>
                        <td style="text-align: center;" name="fn"><b><?php echo strtoupper($firstname)." ".strtoupper($lastname);?></b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>2.</b></td>
                        <td style="text-align: center;"><b>Adhar UID</b></td>
                        <td style="text-align: center;" name="ln"><b><?php echo $adharuid?></b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>3.</b></td>
                        <td style="text-align: center;"><b>Bank Name</b></td>
                        <td style="text-align: center;" name="bank"><b><?php echo strtoupper($bank_name);?></b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>4.</b></td>
                        <td style="text-align: center;"><b>Account Number</b></td>
                        <td style="text-align: center;"><b><?php echo $acc_num;?></b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>5.</b></td>
                        <td style="text-align: center;"><b>IFSC CODE</b></td>
                        <td style="text-align: center;"><b><?php echo strtoupper($ifsc);?></b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>6.</b></td>
                        <td style="text-align: center;"><b>Bill Amount</b></td>
                        <td style="text-align: center;"><b><?php echo $total;?></b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;"><b>7.</b></td>
                        <td style="text-align: center;"><b>Subsidy Sanctioned</b></td>
                        <td style="text-align: center;"><b><?php echo $amount_sanctioned;?></b></td>
                    </tr>
                </table>
                <input type="submit" value="Download PDF" onclick="cook()">
                <img src="sign.png" width="450" height="220" align="right"><br><br><br><br>
                <p style="left: 710px;">Name                        </p>
                <p>Regional Agriculture Officer</p><br>

            </form>
        </center>
        </div>
    </div>
</body>
</html>