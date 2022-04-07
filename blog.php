<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeWeb | login page</title>
</head>
<style>
    #main_screen{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 98vw;
        margin: 1rem 0;
    }
    #window{
        width: 90vw;
        height: 100vh;
        box-shadow: grey 5px 3px 6px 6px;
        border-radius: 1rem;
        padding: 1rem;
    }
</style>
<body>
    <?php
        session_start();
         include "./partials/_nav.php";
    ?>

    <div id="main_screen">
       <div id="window">hello world</div>
    </div>

    <?php
         include "./partials/footer.php";
    ?>
</body>
</html>