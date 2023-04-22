<?php 
include("nav.php");
session_start();
if(isset($_SESSION['email']))
{
    $check = $_SESSION['email'];
    include ("config.php");
    $sql = "SELECT * FROM register where email = '$check';";
    $result = mysqli_query($con,$sql);
    if (mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $name = $row['name'];
            $phonenumber = $row['phone_number'];
            $email = $check;
            $reg = $row["reg_date"];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="profile">
    
        <table>
            <tr>
            <th>name</th>
            <th>:</th>
            <td><?php  echo $name;?></td>
            </tr>
            <tr>
                <th>Mobile number</th>
                <th>:</th>
                 <td><?php echo $phonenumber;?></td>
            </tr>
            <tr>
                <th>email</th>
                <th>:</th>
                <td> <?php echo $email;?> </td> 
            
            </tr>
            <tr>
                <th>register date  </th>
                <th>:</th>
                <td><?php echo $reg;?></td>
            </tr>
            
        </table>
    
</body>
</html>
<?php 
}
else{
    header("location:index.php");
}
?>