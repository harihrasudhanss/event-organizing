
<head>
    <link rel="stylesheet" href="select.css">
</head>
<div class="navbar">
    <a href="home.php">Home</a>
    <div class="dropdown">
        <button class="dropbtn">registration
            <i class="fa fa-carret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="mechreg.php">Mechanical</a>
            <a href="csreg.php">computer science</a>
            <a href="eeereg.php">EEE</a>
            <a href="ecereg.php">ECE</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">E-Ticket
            <i class="fa fa-carret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="mechtic.php">Mechanical</a>
            <a href="cstic.php">computer science</a>
            <a href="eeetic.php">EEE</a>
            <a href="ecetic.php">ECE</a>
        </div>
    </div>
    <a href="profile.php">profile</a>
    <a href="logout.php">logout</a>
    
    </div>
    <script>
        window.onscroll =function()
        {myFunction()};
        var navbar = document.getElementsByClassName('navbar');
        var sticky = nav.offsetTop;

        function myFunction(){
            if (window.pageYOffset >= sticky){
                nav.classList.add("sticky")
            }else {
                navbar.classList.remove("sticky");
            }
        }
    </script>
    
   