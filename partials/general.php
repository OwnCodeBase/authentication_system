<?php
    session_start();
    include "./server_conn.php";
    $conn = mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        echo "failed to connect database";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Details|CodeWeb</title>
</head>
<style>
    body{
        width: 100%;
        height: fit-content;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    table{
        text-align: center;
        text-transform: uppercase;
        overflow: hidden;
        border-radius: 1rem;
    }
    tr{
        background-color: rgb(235, 157, 129);
        color: white;
    }
    tr:nth-child(even){
        background-color: orangered;
        color: white;
    }
    tr:hover{
        background-color: white;
        color: orangered;
    }
    td{
        padding: 1rem;
    }
    th{
        background-color: rgb(83, 232, 83);
        color: white;
    }
</style>
<body>
    <?php

        $username = $_SESSION['username'];
        $sql = "SELECT * FROM `table 3` WHERE `username` = '$username';";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            $alert = "Failed to connect database";
            include './error.php';
        }
         $data = mysqli_fetch_assoc($result);
        
         echo '<table>
             <thead>
                 <th colspan="2">Your Details</th>
             </thead>
             <tbody>
                 <tr>
                     <th width="200">Name :</th>
                     <td width="300">'.$data['firstname']." ".$data['lastname'].'</td>
                 </tr>
                 <tr>
                     <th>Username :</th>
                     <td>'.$data['username'].'</td>
                 </tr>
                 <tr>
                     <th>Password :</th>
                     <td>'.$data['password'].'</td>
                 </tr>
                 <tr>
                     <th>Email Address :</th>
                     <td>'.$data['email'].'</td>
                 </tr>
             </tbody>
         </table>';
    ?>
        
</body>
</html>