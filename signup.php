<?php
     include "./partials/server_conn.php";
     $conn = mysqli_connect($servername,$username,$password,$database);

     if(!$conn){
         echo "Unable to connect database".mysqli_connect_error();
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeWeb | login page</title>
</head>
<style>
    #main_screen {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 98vw;
        margin: 1rem 0;
    }

    #window {
        width: 90vw;
        height: 100vh;
        box-shadow: grey 5px 3px 6px 6px;
        border-radius: 1rem;
        padding: 1rem;
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(33, 31, 31, 0.5);
        overflow: hidden;
    }
    #mymodal{
        margin: 5% auto;
        width: 40%;
        overflow: hidden;
        border-radius: 2rem;
    }

    .close {
        float: right;
        font-size: 2rem;
        font-weight: bold;
        color: grey;
    }

    .close:hover {
        color: black;
        cursor: pointer;
    }

    .modal_header {
        background-color: rgb(83, 232, 83);
        padding: 1rem;
    }

    .modal_cont {
        background-color: white;
        padding: 1rem;
    }

    .modal_footer {
        background-color: rgb(83, 232, 83);
        padding: 1rem;
    }

    /* form css starts */
    form>input{
        width: 100%;
        height: 2rem;
        border: none;
        border-bottom: 2px solid gray;
        padding: 0.5rem;
        outline: none;
        margin-top: 1rem;
    }
    input[name="firstname"],input[name="lastname"]{
        width: 49%;
    }
    .submit_btn{
        background-color: orangered;
        color: white;
        width: 49%;
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
    
    /* form css ends */
</style>

<body>
    <?php
         include "./partials/_nav.php";
    ?>

    <div id="main_screen">
        <div id="window">
            <!-- <button class="modal_btn">signup</button> -->
            <!-- modal content start -->

            <!-- <div class="modal">
                <div id="mymodal"> -->
                    <div class="modal_header">
                        <!-- <div class="close">&times;</div> -->
                        <h1>Sign up form</h1>
                    </div>
                    <div class="modal_cont">
                        <!-- form starts from here -->
                        <?php
                    
                    $userError = false;
                    $passError = false;
                    $success = false;

                     if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $email = $_POST['email'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $cpassword = $_POST['cpassword'];
                        $passhash = password_hash($password, PASSWORD_DEFAULT);

                        $existsql = "SELECT * FROM `table 3` WHERE username='$username';";
                        $result = mysqli_query($conn,$existsql);
                        $num = mysqli_num_rows($result);

                            if($num > 0){
                                $userError = true;
                            }
                            else{                                
                                if($password==$cpassword){
                                    $sql = "INSERT INTO `table 3` (`firstname`, `lastname`, `email`, `username`, `password`) VALUES ('$firstname', '$lastname', '$email', '$username', '$passhash');";
                                    $result = mysqli_query($conn,$sql);

                                    if($result){
                                        $success = true;
                                    }
                                    else{
                                        $success = false;
                                    }
                                }                                
                                else{
                                    $passError = true;
                                }
                            }
                     }
                ?>

                        <form action="./signup.php" method="post">

                            <input type="text" placeholder="Firstname" name="firstname" maxlength="10">
                            <input type="text" placeholder="Lastname" name="lastname" maxlength="10">
                            <input type="email" placeholder="Email Address" name="email" maxlength="30">
                            <input type="text" placeholder="UserName" name="username" maxlength="10">
                            <input type="password" placeholder="Password" name="password" maxlength="10">
                            <input type="password" placeholder="Confirm Password" name="cpassword" maxlength="10">

                            <button type="submit" class="submit_btn">SUBMIT</button>
                            <button type="reset" class="submit_btn">RESET</button>

                        </form>

                        <!-- form ends from here -->
                    </div>
                    <div class="modal_footer">
                        <?php
                             if($userError==true){
                                $alert = "User name already exist";
                                include "./partials/error.php";
                            }
                            if($passError==true){
                                $alert = "Password are not same.Please input same password";
                                include "./partials/error.php";
                            }
                            if($success==true){
                                $alert = "Successfully submitted";
                                include "./partials/success.php";
                            }
                        ?>        
                    </div>
                <!-- </div>
            </div> -->
        </div>
    </div>
    <!-- modal ends here -->

    <?php
         include "./partials/footer.php";
    ?>
</body>
<script>
    // var mymodal = document.getElementsByClassName("modal")[0];
    // var close = document.getElementsByClassName("close")[0];
    // var btn = document.getElementsByClassName("modal_btn")[0];

    // btn.onclick = function () {
    //     mymodal.style.display = "block";
    // }

    // close.onclick = function () {
    //     mymodal.style.display = "none";
    // }

    // window.onclick = function (event) {
    //     if (event.target == mymodal) {
    //         mymodal.style.display = "none";
    //     }
    // }

</script>

</html>