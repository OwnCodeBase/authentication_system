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
    
    /* form css ends */
</style>
<body>
    <?php 
        include './partials/_nav.php';
    ?>
    <div id="main_screen">
       <div id="window">
           <div class="modal_header">
                                <!-- <div class="close">&times;</div> -->
                                <h1>Login form</h1>
                    </div><div class="modal_cont">
                        <!-- form starts from here -->
                       <?php 
                                $login = false;
                                $userError=false;
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    
                                    // checking for credentials in database
                                    $sql = "SELECT * FROM `table 3` WHERE username='$username';";    
                                    $result = mysqli_query($conn, $sql);
                                    $num = mysqli_num_rows($result);

                                    // if found row is equal to 1 
                                    if($num == 1){        
                                            $data = mysqli_fetch_assoc($result);
                                            $hash = $data['password'];

                                            if(password_verify($password,$hash)){
                                                $login = true;
                                                session_start();
                                                $_SESSION['loggedin'] = true;
                                                $_SESSION['firstname'] = $data['firstname'];
                                                $_SESSION['lastname'] = $data['lastname'];
                                                $_SESSION['email'] = $data['email'];
                                                $_SESSION['username'] = $data['username'];
                                                header('location: ./dashboard.php');
                                            }
                                            else{
                                                $userError=true;
                                            }
                                    }
                                    else{
                                        $userError=true;
                                    }
                                }
                        ?>
                        <form action="./login.php" method="post">

                            <input type="text" placeholder="UserName" name="username" maxlength="10">
                            <input type="password" placeholder="Password" name="password" maxlength="10">
                            <button type="submit" class="submit_btn">LOGIN</button>

                        </form>

                        <!-- form ends from here -->
                    </div>
                    <div class="modal_footer">
                        <?php
                            if($login == true){
                                $alert = "You are logged in.";
                                include "./partials/success.php";
                            }
                            if($userError == true){
                                $alert = "Invalid credentials";
                                include "./partials/error.php";
                            }
                        ?>        
                    </div>
       </div>
    </div>

    <?php
         include "./partials/footer.php";
    ?>
</body>
</html> 