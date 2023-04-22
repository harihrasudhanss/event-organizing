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
    <title>event registration - EEE</title>
    
</head>
<?php
 include ("config.php");
 include ("nav.php");
 if (isset($_POST["eeereg_submit"]))
 {
    $rname = $_POST["rname"];
    $rphone = $_POST["rphonenumber"];
    $remail = $_POST["remail"];
    $rroll = $_POST["rroll"];
    $college = $_POST["college_name"];
    $sec = $_POST["sec"];

    //name validation 

    if(empty($rname))
    {
        $error =" enter the name";
    }
    elseif(strlen($rname)>25)
    {
        $error = "name should be below 25 characters";
    }
    elseif(strlen($rname)<2)
    {
        $error = "name should be more than 2 character";
    }
    elseif( !preg_match("/^[a-zA-Z]*$/",$rname))
    {
        $error = "enter character only";
    }

    //mobile number feild


    elseif(empty($rphone))
    {
        $error = "enter the phone number";
    }
    elseif(strlen($rphone )!=10)
    {
        $error = "enter the correct mobile number";
    }
    elseif (!preg_match("/^[0-9]*$/",$rphone))
    {
        $error = " invalid mobile number ";
    }

    //email feild

    elseif(empty($remail))
    {
        $error = "enter the e-mail";
    }
    
    //roll number feild

    elseif(empty($rroll))
    {
        $error = "enter the roll number";
    }
    elseif(!preg_match("/^[0-9]*$/",$rroll))
    {
        $error = " enter the correct roll  number";
    }
    elseif(strlen($rroll)<3)
    {
        $error = " enter the full roll number ";
    }
    //college
    elseif (empty($college))
    {
        $error = "enter the college name";
    }
    elseif (!preg_match("/^[A-Z a-z]*$/",$college))
    {
        $error = "invalid college name";
    }
    // section feild 

    elseif (empty($sec))
    {
        $error = " enter the section";
    }
    elseif(!preg_match("/^[A-Za-z]*$/",$sec))
    {
        $error = " invalid section";
    }
    elseif(strlen($sec)!=1)
    {
        $error = " invalid section";
    }


    
    else {
        $check_remail = "SELECT email,phone_number,roll_no FROM eeereg WHERE email = '$remail' || phone_number = '$rphone' || roll_no = '$rroll';";
        $result = mysqli_query($con ,$check_remail);
        $remailresult = mysqli_fetch_array($result);
        if ( $remailresult > 0)
        {
            $error = "email or phone number or roll no already exist";
        }
        else 
        {
            $insertreg = "INSERT INTO eeereg(name,phone_number,email,roll_no,college,section) VALUES('$rname','$rphone','$remail','$rroll','$college','$sec');";
            $q = mysqli_query($con, $insertreg);
            
            if ($q) {
                $sucess = "registered succesfully";
            }
        }
    }
}
?>


<body style="background :url('eee.jpg')">
    
    <form action="eeereg.php" method="post" autocomplete="off">
    <div class="tdtitle">student register form</div>
    <table autocomplete="false" style="background-color: #f1f1f18a;">
    
        <tr>
            <th>Name</th>
            <td><input type="text" name="rname"  ></td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td><input type="text" name="rphonenumber" autocomplete="off"></td>
        </tr>
        <tr>
            <th>E-Mail</th>
            <td><input style="text-transform: none;" type="text" name="remail" autocomplete="off"  ></td>
        </tr>
        <tr>
            <th>Roll number</th>
            <td><input type="text" name="rroll" autocomplete="off" ></td>
        </tr>
        <tr>
            <th>college name </th>
            <td><input type="text" name = "college_name" autocomplete="off"></td>
        </tr>
        <tr>
            <th>section</th>
            <td><input type="text" name="sec" autocomplete="off" ></td>
        </tr>
        <tr>
            
            <td><input type="submit" value="register" name="eeereg_submit" class="submit"></td>
        </tr>
        
        <tr>
            <td style="color: red; font-weight: bold; ">
            <?php if (isset($sucess)) {
                echo" <span style='background-color:green;color:white;width:200px' >". $sucess . "<span>";
            }  ?>
        </td>
            <td style="color: red; font-weight: bold; "><?php 
           if (isset($error)) {
            echo" <span style='background-color:red;color:white;width:200px' >". $error . "<span>";
            } ?></td>
            
        </tr>
        

    </form>
    
    
</body>
</html>
<?php 
}
else
{
    header("location:index.php");
}
?>