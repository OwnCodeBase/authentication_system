<?php
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        $loggedin = true;
    }
    else{
        $loggedin = false;
    }
    echo '     
     <style>
     *{
         box-sizing: border-box;
         margin: 0;
         padding: 0;
     }
     nav{
         display: flex;
         width: 98.6vw;
         align-items: center;
         justify-content: center;
         background-color: rgb(83, 232, 83);
     }
     .logo{
         width: 20vw;
         text-align: center;
     }
     .nav_link, .nav_icon{
         width: 60vw;
         display: flex;
         align-items: center;
         justify-content: center;
     }
     a:link{
         padding: 1rem;
         text-decoration: none;
         color: white;
     }
     a:active{
         color: white;
     }
     a:visited{
         color:white;
     }
     a:hover{
         color: rgb(83, 232, 83);
         background-color: white;
     }
    .bar{
        width: 20vw;
        height: 1.9rem;
        padding: 0.9rem;
        outline: none;
        border-radius: 1rem;
        border: none;
    }
    .navbar_btn{
        padding: 0.49rem;
        border-radius: 0.4rem;
        background-color: orangered;
        color: white;
        margin: 0.5rem;
    }
    .navbar_btn:hover{
        background-color: white;
        color: orangered;
    }
     
 </style>
 <nav>
     <div class="logo">
         <h1>Code Web</h1>
     </div>
     <div class="nav_link">';
     
    echo  '<a href="index.php">Home</a>
     <a href="./blog.php">Blog</a>
     <a href="./contact.php">Contact</a>
     </div>
     <div class="nav_icon">
     <input type="search" placeholder="search the web" class="bar">';
     
    if($loggedin){
         echo '<a href="./logout.php" class="navbar_btn">Log Out</a>';
    }

    if(!$loggedin){
         echo '<a href="./login.php" class="navbar_btn">Login</a>
                <a href="./signup.php" class="navbar_btn">Sign Up</a>';
    }
    echo '
     </div>
 </nav>';
?>