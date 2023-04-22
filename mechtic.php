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
    <title>E-ticket-Mechanical</title>
    <link rel="stylesheet" href="ticket.css">

</head>
<?php 
include("nav.php"); 
include("config.php");

if(isset($_POST["mechtic_submit"]))
{
    $tcemail = $_POST["temail"];
    $check_temail = "SELECT * FROM mechreg WHERE email = '$tcemail'";
    $temail_check = mysqli_query($con,$check_temail);
    if (mysqli_num_rows($temail_check)>0)
    {
        while ($row = mysqli_fetch_assoc($temail_check)){
            $tcname = $row['name'];
            $tcphone = $row['phone_number'];
            $tcemail = $row['email'];
            $tcroll = $row['roll_no'];
            $tcdepartment = "mechanical engineering";
            $tccollege = $row['college'];
            $tcsection  =  $row['section'];
            $tcpayment = $row['payment'];
            $_SESSION['mechpayment'] = $row['payment'];
        }
    }
    else{
        echo "<script>alert('no record found');</script>";
    }
} 
?>
<body>
    <div class="form">
        <form action="mechtic.php" method="post" name="export_form">
            <input type="text" name="temail" placeholder="enter your email" class="textbox">
            <input type="submit" name="mechtic_submit" value="search" class="submit">
        </form>
    </div>
    <div class="ticket" style="background-color:white"; id="ticket";name = "ticket";>
    <?php if(isset($tcname)){
       echo "<table>";
        echo "<tr>";
           echo "<th>Name:</th>";
            echo "<td>";
                if(isset($tcname))
                {
                    echo $tcname;
                }
                
                
            echo "</td>";
    echo "</tr>";
    echo "<tr>";
       echo "<th>Phone number:</th>";
        echo "<td>";
                if(isset($tcphone))
                {
                    echo $tcphone;
                }
                
                
            echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<th>E-mail:</th>";
        echo "<td>";
                if(isset($tcemail))
                {
                    echo $tcemail;
                }
            echo "</td>";
    echo "</tr>";
       echo "<tr>";
        echo "<th>Roll no:</th>";
        echo "<td>";
                if(isset($tcroll))
                {
                    echo $tcroll;
                }
            echo "</td>";
    echo "</tr>";
    echo "<tr>";
        echo "<th>Department:</th>";
        echo "<td>";
                if(isset($tcdepartment))
                {
                    echo $tcdepartment;
                }
            echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>college:</th>";
    echo "<td>";
            if(isset($tccollege))
                 {
                    echo $tccollege;
                 }
            echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Payment :</th>";
    echo "<td>";
            if(isset($tcpayment))
                 {
                    echo $tcpayment;
                 }
            echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Section :</th>";
    echo "<td>";
         if(isset($tcsection))
                {
                    echo $tcsection ;
                }
            echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Date :</th>";
    echo "<td>";
         if(isset($tcsection))
                {
                    echo date('d/m/Y') ;
                }
            echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>.</td>";
    echo "<td>";
    echo "<input type='button' onclick='printDiv()' value ='print'class='print_btn'> ";
    echo "</td>";
    echo "</tr>";

    echo "</div>";

}

    ?>
</body>
<script>
    function printDiv()
    {
        var print_div = document.getElementById("ticket");
        var print_area = window.open();
        print_area.document.write(print_div.innerHTML);
        print_area.document.close();
        print_area.focus();
        print_area.print();
        print_area.close();
    }
</script>
</html>
<?php 
}
else
{
    header("location:index.php");
}
?>