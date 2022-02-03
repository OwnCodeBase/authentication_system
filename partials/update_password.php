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
            $passerror = false;

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $old_password = $_POST['old_password'];
                $new_password = $_POST['new_password'];
                $hash_user_new = password_hash($new_password, PASSWORD_DEFAULT);
                $username = $_SESSION['username'];
                   
                $sql = "SELECT * FROM `table 3` WHERE `table 3`.`username` = '$username';";
                $result = mysqli_query($conn,$sql);
                $data = mysqli_fetch_assoc($result);
                $hash_database = $data['password'];
                
                if(password_verify($old_password,$hash_database)){
                    $sql = "UPDATE `table 3` SET `password` = '$hash_user_new' WHERE `table 3`.`username` = '$username';";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        $success = true;
                    }
                    else{
                        $failederror = true;
                    }
                }
                else{
                    $passerror = true;
                }
            }
            ?>
    <!-- form starts -->
    <form action="./update_password.php" method="post">

        <h1>Update your Password</h1>
        <?php
                if($error){
                    $alert = 'Failed to update your password';
                    include './error.php';
                }
                if($success){
                    $alert = 'Updated successfully';
                    include './success.php';
                }
                if($passerror){
                    $alert = 'Please input correct Old password';
                    include './error.php';
                }
        ?>
        <input type="password" placeholder="Old password" name="old_password" maxlength="10">
        <input type="password" placeholder="New password" name="new_password" maxlength="10">
        <button type="submit" class="submit_btn">UPDATE PASSWORD</button>

    </form>
    <!-- form ends -->
</body>

</html>