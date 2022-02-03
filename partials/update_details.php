<?php
    include "./server_conn.php";
    $conn = mysqli_connect($servername,$username,$password,$database);
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Details | WebCode</title>
</head>
<style>
    body{
        width: 100vw;
        height: 50vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        overflow: auto;
    }
    form{
        text-align: center;
        width: 80vw;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
    }
    form>input{
        width: 100%;
        height: 2rem;
        border: none;
        border-bottom: 2px solid gray;
        padding: 0.5rem;
        outline: none;
        margin-top: 1rem;
        text-transform: uppercase;
    }
    .submit_btn{
        background-color: orangered;
        color: white;
        width: 100%;
        padding: 0.4rem;
        margin-top: 1rem;
        border-radius: 1rem;
        border: none;
    }
    .submit_btn:hover{
        background-color: white;
        color: orangered;
        border: 2px solid orangered;
    }
</style>
<body>
    
    <?php   
            $error = false;
            $success = false;
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];

                $username = $_SESSION['username'];
                
                $sql = "SELECT * FROM `table 3`";
                $result = mysqli_query($conn,$sql);
                if(!$result){
                    $alert = "failed to connect database";
                    include './error.php';
                }

                $sql = "UPDATE `table 3` SET `firstname` = '$firstname' , `lastname` = '$lastname' WHERE `username` = '$username';";
                $result = mysqli_query($conn,$sql);
                if($result){
                    $success = true;
                }
                else{
                    $error = true;
                }
            }
            ?>
    <form action="./update_details.php" method="post">
            <h1>Update your Name</h1>
            <?php
                 if($error){
                     $alert = 'Failed <b>Error :</b>'.mysqli_error($conn);
                     include './error.php';
                 }
                 if($success){
                     $alert = 'Updated successfully';
                     include './success.php';
                 }
            ?>
            <input type="text" placeholder="New Firstname" name="firstname" pattern="[A-Z]" maxlength="10">
            <input type="text" placeholder="New Lastname" name="lastname" pattern="[A-Z]" maxlength="10">
            <a href="./update_details.php"></a>
            <button type="submit" class="submit_btn">UPDATE NAME</button>

    </form>
</body>
</html>