<?php
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        header('location: ./login.php');
        exit();
    } 
    else{
         $login = true;
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Code Web</title>
</head>
<style>
    .main_screen {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 150vh;
        height: 140vh;
        width: 98vw;
        overflow: hidden;
        display: grid;
        grid-template-columns: 1fr 3fr;
        align-items: center;
        justify-content: center;
    }
    #side_bar{
        border: 2px solid black;
        width: 20vw;
        height: 100%;
    }
    #target_screen{
        border: 2px solid black;
        width: 80vw;
        height: 100%;
    }
    #side_bar{
        background-color: rgb(172, 240, 172);
        display: flex;
        flex-direction: column;
    }
    .side_link{
        width: 100%;
        height: 3rem;
        padding-left: 2em;
        font-size: large;
        background-color: green;
        color: white;
    }
    .side_link:nth-child(even){
        background-color: rgb(83, 232, 83);
    }
    .side_link:hover{
        color: green;
        background-color: white;
    }
</style>
<body>
    <?php
        include './partials/_nav.php';
    ?>

    <div class="main_screen">
        <div id="side_bar">
            <a class="side_link" target="iframe" href="./partials/gernal.php">General</a>
            <a class="side_link" target="iframe" href="./partials/update_details.php">Update Details</a>
        </div>
        <iframe id="target_screen" name='iframe'>

        </iframe>
    </div>

    <?php
         include './partials/footer.php';
    ?>
</body>
</html>