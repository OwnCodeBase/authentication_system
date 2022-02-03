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

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $email = $_POST['email'];
                $username = $_SESSION['username'];
                   
                    $sql = "UPDATE `table 3` SET `email` = '$email' WHERE `table 3`.`username` = '$username';";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        $success = true;
                    }
                    else{
                        $error = true;
                    }    
            }
            ?>
    <!-- form starts -->
    <form action="./update_email.php" method="post">

        <h1>Update your Email address</h1>
        <?php
                if($error){
                    $alert = 'Failed to update your Email Adrress';
                    include './error.php';
                }
                if($success){
                    $alert = 'Updated successfully';
                    include './success.php';
                }
        ?>
        <input type="text" placeholder="New Email" name="email" maxlength="30">
        <button type="submit" class="submit_btn">UPDATE USERNAME</button>

    </form>
    <!-- form ends -->
</body>

</html>