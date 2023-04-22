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
    <title>Home</title>
    <link rel="stylesheet" href="select.css">
    <link rel="stylesheet" href="card.css">
</head>
<body class="homebody">
    
   <?php include("nav.php");?>
   

  

     <div class="grid-container">
     <a href="mech.php"><div class="grid-items"><div class="card">
            <img src="mech.jpg" alt="avatar" >
            <div class="cardcontainer">
                <h4><b>mechanical</b></h4>
                <p>Suresh kumar</p>
            </div>
        </div></div></a>
        <a href="cs.php"><div class="grid-items"><div class="card">
            <img src="cs.jpg" alt="avatar" >
            <div class="cardcontainer">
            <h4><b>computer science</b></h4>
                <p>Arunachalam</p>
            </div>
        </div></div></a>
        <a href="ece.php"><div class="grid-items"><div class="card">
            <img src="ece.jpg" alt="avatar" >
            <div class="cardcontainer">
            <h4><b>electronics and communication</b></h4>
                <p>vimal</p>
            </div>
        </div></div></a>
        <a href="eee.php"><div class="grid-items"><div class="card">
            <img src="eee.jpg" alt="avatar" >
            <div class="cardcontainer">
            <h4><b>Electical and electronics</b></h4>
                <p>vimal</p>
            </div>
        </div></div></a>
    </div>
    
    
   
    
</body>
</html>
<?php 
}
else{
    header("location:index.php");
}
?>