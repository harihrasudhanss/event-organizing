<?php 
session_start();
if(isset($_SESSION['email']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="studentreg.css">
    <title>event registration - computer science</title>
    
</head>
<?php
 include ("config.php");
 
 if (isset($_POST["csreg_submit"]))
 {
    $cname = $_POST["cname"];
    $cphone = $_POST["cphonenumber"];
    $cemail = $_POST["cemail"];
    $croll = $_POST["croll"];
    $ccollege = $_POST["ccollege_name"];
    $csec = $_POST["csec"];

    //name validation 

    if(empty($cname))
    {
        $error =" enter the name";
    }
    elseif(strlen($cname)>25)
    {
        $error = "name should be below 25 characters";
    }
    elseif(strlen($cname)<2)
    {
        $error = "name should be more than 2 character";
    }
    elseif( !preg_match("/^[a-zA-Z]*$/",$cname))
    {
        $error = "enter character only";
    }

    //mobile number feild


    elseif(empty($cphone))
    {
        $error = "enter the phone number";
    }
    elseif(strlen($cphone )!=10)
    {
        $error = "enter the correct mobile number";
    }
    elseif (!preg_match("/^[0-9]*$/",$cphone))
    {
        $error = " invalid mobile number ";
    }

    //email feild

    elseif(empty($cemail))
    {
        $error = "enter the e-mail";
    }
    
    //roll number feild

    elseif(empty($croll))
    {
        $error = "enter the roll number";
    }
    elseif(!preg_match("/^[0-9]*$/",$croll))
    {
        $error = " enter the correct roll  number";
    }
    elseif(strlen($croll)<3)
    {
        $error = " enter the full roll number ";
    }
    //ccollege
    elseif (empty($ccollege))
    {
        $error = "enter the ccollege name";
    }
    elseif (!preg_match("/^[A-Za-z]*$/",$ccollege))
    {
        $error = "invalid ccollege name";
    }
    // section feild 

    elseif (empty($csec))
    {
        $error = " enter the section";
    }
    elseif(!preg_match("/^[A-Za-z]*$/",$csec))
    {
        $error = " invalid section";
    }
    elseif(strlen($csec)!=1)
    {
        $error = " invalid section";
    }


    
    else {
        $check_cemail = "SELECT email,phone_number,roll_no FROM csreg WHERE email = '$cemail' || phone_number = '$cphone' || roll_no = '$croll';";
        $result = mysqli_query($con ,$check_cemail);
        $cemailresult = mysqli_fetch_array($result);
        if ( $cemailresult > 0)
        {
            $error = "email or phone number or roll no already exist";
        }
        else 
        {
            $insertreg = "INSERT INTO csreg (name,phone_number,email,roll_no,college,section) VALUES('$cname','$cphone','$cemail','$croll','$ccollege','$csec');";
            $q = mysqli_query($con, $insertreg);
            
            if ($q) {
                $sucess = "registered succesfully";
            }
        }
    }
}
?>


<body style="background:url('cs.jpg');background-size:cover;">
    <?php include("nav.php");?>
    <form action="csreg.php" method="post">
    <div class="tdtitle">student register form</div>
    <table style ="background-color: #f1f1f18a;">
    
        <tr>
            <th>Name</th>
            <td><input type="text" name="cname" ></td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td><input type="text" name="cphonenumber" ></td>
        </tr>
        <tr>
            <th>E-Mail</th>
            <td><input style="text-transform:none" type="text" name="cemail" ></td>
        </tr>
        <tr>
            <th>Roll number</th>
            <td><input type="text" name="croll" ></td>
        </tr>
        <tr>
            <th>college name </th>
            <td><input type="text" name = "ccollege_name"></td>
        </tr>
        <tr>
            <th>section</th>
            <td><input type="text" name="csec" ></td>
        </tr>
        <tr>
            
            <td><input type="submit" value="register" name="csreg_submit" class="submit"></td>
        </tr>
        
        <tr>
            <td style="color: red; font-weight: bold; ">
            <?php if (isset($sucess)) {
                echo" <span style='background-color:green;color:white;width:200px' >". $sucess . "<span>";
            }  ?>
        </td>
            <td style="color: red; font-weight: bold; "><?php 
           if (isset($error)) {
            echo" <span style='background-color:red;color:white;width:200px' >". $error. "<span>";
            } ?></td>
            
        </tr>
        

    </form>
    
    
</body>
</html>
<?php 
}
else{
    header("location:index.php");
}
?>