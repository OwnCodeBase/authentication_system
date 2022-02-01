<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    nav {
        display: flex;
        width: 98.6vw;
        align-items: center;
        justify-content: center;
        background-color: rgb(83, 232, 83);
    }

    .logo {
        width: 20vw;
        text-align: center;
    }

    .nav_link,
    .nav_icon {
        width: 60vw;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    a:link {
        padding: 1rem;
        text-decoration: none;
        color: white;
    }

    a:active {
        color: white;
    }

    a:visited {
        color: white;
    }

    a:hover {
        color: rgb(83, 232, 83);
        background-color: white;
    }

    input[type="search"] {
        width: 20vw;
        height: 1.9rem;
        padding: 0.9rem;
        outline: none;
        border-radius: 1rem;
        border: none;
    }

    #login {
        padding: 0.49rem;
        border-radius: 0.4rem;
        background-color: orangered;
        color: white;
        margin: 0.5rem;
        border: none;
    }

    #login:hover {
        background-color: white;
        color: orangered;
    }
</style>

<body>
    <nav>
        <div class="logo">
            <h1>Code Web</h1>
        </div>
        <div class="nav_link">

            <a href="index.php">Home</a>
            <a href="./blog.php">Blog</a>
            <a href="./contact.php">Contact</a>

        </div>
        <div class="nav_icon">
            <input type="search" placeholder="search the web">
            <a href="./login.php" id="login">Login</a>
            <a href="./signup.php" id="login" class="close_btn">Sign Up</a>
        </div>
    </nav>
</body>

</html>