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
    <title>update Details|WebCode</title>
</head>
<style>
    body {
        width: 100vw;
        height: 50vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        overflow: auto;
    }

    form {
        text-align: center;
        width: 80vw;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    form>input {
        width: 100%;
        height: 2rem;
        border: none;
        border-bottom: 2px solid gray;
        padding: 0.5rem;
        outline: none;
        margin-top: 1rem;
        text-transform: uppercase;
    }

    .submit_btn {
        background-color: orangered;
        color: white;
        width: 100%;
        padding: 0.4rem;
        margin-top: 1rem;
        border-radius: 1rem;
        border: none;
    }

    .submit_btn:hover {
        background-color: white;
        color: orangered;
        border: 2px solid orangered;
    }
</style>

<body>

    <?php   
            $error = false;
            $success = false;
            $failederror = false;

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $new_username = $_POST['username'];
                $username = $_SESSION['username'];

                $existsql = "SELECT * FROM `table 3` WHERE `username`='$new_username';";
                $result = mysqli_query($conn,$existsql);
                $num = mysqli_num_rows($result);

                if($num == 1){
                    $error = true;
                }
                else{    
                    $sql = "UPDATE `table 3` SET `username` = '$new_username' WHERE `table 3`.`username` = '$username';";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        $success = true;
                    }
                    else{
                        $failederror = true;
                    }
                }
            }
            ?>
    <!-- form starts -->
    <form action="./update_username.php" method="post">

        <h1>Update your Username</h1>
        <?php
                if($error){
                    $alert = 'Username Already Exist';
                    include './error.php';
                }
                if($success){
                    $alert = 'Updated successfully';
                    include './success.php';
                }
                if($failederror){
                    $alert = 'Failed to update';
                    include './success.php';
                }
        ?>
        <input type="text" placeholder="New Username" name="username" maxlength="10">
        <button type="submit" class="submit_btn">UPDATE USERNAME</button>

    </form>
    <!-- form ends -->
</body>

</html>