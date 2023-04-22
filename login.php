<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
include ("config.php");
if(isset($_POST["login_submit"]))
{
    $useremail = $_POST["login_email"];
    $_SESSION['email'] = $useremail;
    $userpassword = $_POST["login_password"];
    $dbcheck = "select email,password from register where email = '$useremail'&& password = '$userpassword';";
    $dbresult = mysqli_query($con,$dbcheck);
    if (mysqli_num_rows($dbresult)>0){
        while ($row = mysqli_fetch_assoc($dbresult)){
            // $_SESSION['email'] = $useremail;
            header("location:home.php");
        }
    }else {
        $error = "Invalid Email or Password";
    }
}

    
?>
<body>
<form action="login.php" method="post">
    <table style="background-color: #f1f1f18a;">
        <tr>
            <th>E-Mail </th>
            <td><input type="email" name="login_email"></td>
            
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="password" name="login_password"></td>
            
        </tr>
        <tr>
            <td></td>
           <td> <input type="submit" name="login_submit" class="submit"</td>
        </tr>
        <tr>
            <td></td>
            <td style="color: red; font-weight: bold; "><?php 
           if (isset($error)) {
                echo $error;
            }
       
        ?></td>
        </tr>
        <tr>
            <td>new user!</td>
            <td ><a href="signup.php" style="text-decoration: none; color:black; text-transform:capitalize;"><b>signup</a></td>
        </tr>
    </table>
</form>

</body>

</html>
