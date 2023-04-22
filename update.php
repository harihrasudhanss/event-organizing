<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="update.css">
</head>
<?php
error_reporting(E_ALL ^ E_WARNING);
include("config.php");
if(isset($_POST['update']))
{
$updateemail = $_POST['updateemail'];
$updateamount = $_POST['updateamount'];
$updatedpt = $_POST['updatedpt'];
if(empty($updateemail))
{
    $error = "enter the email";
}
elseif(empty($updateamount))
{
    $error = "enter the amount";
}

else
{
   if($updatedpt == "MECH" || "mech")  
   {
    $table = "mechreg";
   }
   elseif($updatedpt == "ECE" ||"ece")
   {
    $table = "ecereg";
   }
   elseif($updatedpt == "EEE"||"eee")
   {
    $table = "eeereg";
   }
   elseif($updatedpt == "CSE"||"cse")
   {
    $table = "csreg";
   }
   else
   {
    $error = "enter the valid department ex cse,mech,eee,ece";
   }
   $sql = "SELECT payment FROM $table WHERE email = '$updateemail'; ";
   $sql_check = mysqli_query($con,$sql);
   if(mysqli_num_rows($sql_check)>0)
   {
    while($row = mysqli_fetch_assoc($sql_check))
    {
        $dbpayment = $row['payment'];
    }
    $updatedpayment = $dbpayment - $updateamount;
    if($dbpayment == "paid")
    {
        $error= "no pending payment";
    }
    
    elseif($updatedpayment == 0)
    {
        $updateamount ="paid";
        $update = "UPDATE $table SET payment = '$updateamount' WHERE email = '$updateemail';";
    $status = mysqli_query($con,$update);
    if($status)
    {
        $sucess = "update sucess";
    }
    else
   {
    $error = "enter the valid departmentS";
   }
   }
   
   else
   {
    $update = "UPDATE $table SET payment = '$updatedpayment' WHERE email = '$updateemail';";
    $status = mysqli_query($con,$update);
    if($status)
    {
        $sucess = "update sucess";
    }
    else
   {
    $error = "enter the valid departmentS";
   }
   }
    }

    

   
}
}
?>



<body>
    <?php include('nav.php'); ?>

    <form action="update.php" method="post" autocomplete="off">
        <input style="text-transform:none" type="text"  name ="updateemail" placeholder = "enter email here" ><br><br>
        <input type="text" placeholder="enter the amount here" name ="updateamount" ><br><br>
        <input style="text-transform:uppercase;" type="text" placeholder = "enter the department" name = "updatedpt"><br><br>
        <input type="submit" name="update"   value="update" class="updatebtn">
        <div style ="color:white; background-color:red;" >
    <?php
        if(isset($error)) 
        {
           echo $error;
        }
        
        if (isset($sucess)) 
        {
            echo $sucess;
        }
    ?>
    </div>
    </form>
    
    
</body>
</html>