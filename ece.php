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
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Electronics &comunication engineering</title>
    <link rel="stylesheet" href="card.css">
</head>
<?php include ("nav.php")?>
<body >
<?php 
    include ("config.php");
    $sql = "SELECT name,college,payment FROM ecereg";
    $result = mysqli_query($con,$sql);
    echo "<br>";
    echo "<table >";
    echo "<tr>";
        echo "<th>"."name"."</th>";
        echo "<th>college name</th>";
        echo "<th>payment status</th>";
        echo "</tr>";
    while ($row = mysqli_fetch_assoc($result))
    {
        
        echo"<tr>";

        foreach($row as $cfeild => $value)
        {
            echo "<td>".$value."</td>";
            
        }
        
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <a   href="update.php"> <button class = 'update_btn' >update</button></a>

       
</body>
</html>
<?php 
}
else
{
    header("location:index.php");
}
?>