<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php 
// session_start();
include ("config.php");

if (isset($_POST["signup_submit"])) {
    $sname = mysqli_real_escape_string($con, $_POST["signup_name"]);
    $semail = mysqli_real_escape_string($con, $_POST["signup_email"]);
    // $_SESSION['semail'] = $email;
    $spassword = mysqli_real_escape_string($con, $_POST["signup_password"]);
    $sconfirmpassword = mysqli_real_escape_string($con, $_POST["signup_confirm_password"]);
    $sphonenumber = mysqli_real_escape_string($con, $_POST["signup_phonenumber"]);
    if (empty($sname)) {
        $error = "name is required";
    } elseif (empty($semail)) {
        $error = "email field is required";
    } elseif (empty($spassword)) {
        $error = "password field is required";
    }  elseif ($spassword != $sconfirmpassword) {
        $error = "password does not match";
    } elseif (strlen($sname) < 3 || strlen($sname) > 20) {
        $error = "name must be between 3 to 20 characters";
    } elseif (strlen($spassword) < 6) {
        $error = "password must be atleast 6 chacater";
    } else {
        $check_email = "SELECT email FROM register WHERE email='$semail'";
        $data = mysqli_query($con, $check_email);
        $result = mysqli_fetch_array($data);
        if ($result > 0) {
            $error = "Email already exist";
        } else {
            // simple password hash algorithum md5
            // $pass = md5($password);
            $insert = "INSERT INTO register (name,phone_number,email,password) Value('$sname','$sphonenumber','$semail','$spassword')";
            $q = mysqli_query($con, $insert);
            
            if ($q) {
                 
                header('location:login.php');
            }
        }
    }
}

?>
<body>
<form action= "signup.php" method="post"  >
    <table style="background-color: #f1f1f18a;">
        <tr>
            <th>Name</th>
            <td><input type="text" name="signup_name" ></td>
        </tr>
        <tr>
            <th>Phone Number</th>
            <td><input type="text" name="signup_phonenumber" ></td>
        </tr>
        <tr>
            <th>E-Mail</th>
            <td><input type="text" name="signup_email" ></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><input type="password" name="signup_password" ></td>
        </tr>
        <tr>
            <th>Confirm Password</th>
            <td><input type="password" name="signup_confirm_password"></td>
            
            
        </tr>
        <?php ?>
        <tr>
            <td></td>
           <td> <input type="submit" name="signup_submit" value="Register" class="submit" </td>
        </tr>
        <tr>
            <td></td>
            <td style="color: red; font-weight: bold; "><?php 
           if (isset($error)) {
                echo $error;
            }  ?></td>
        </tr>
        <tr>
            <td>already have an account!</td>
            <td ><a href="login.php" style="text-decoration: none; color:black; "><b>login</a></td>
        </tr>
    </table>
</form>
</body>
</html>