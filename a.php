<?php
  session_start();
?>
<?php
      $_SESSION["admin_mail"]=$_POST['email'];
      $_SESSION["admin_pass"]=$_POST['password'];
      header("Location: admin.php");
?>