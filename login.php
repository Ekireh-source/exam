<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">

        <style>

            

        </style>
    </head>
    <body>
       <section class="parent-container">
       <?php
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                
                }else {
                    echo "<div>Passwords mismatch</div>";
                }
            }else {
                echo "<div>No such user</div>";
            }
        }
    
        ?>
        <nav class="navbar">
            <h1>Company</h1>
            <div class="nav-items">
               <ul>
                <li>Home</li>
                <li>About</li>
                <li>Contact</li>
                <li>Login</li>
                <li>Register</li>
               </ul> 
            <div>
        </nav>
       <div class="centered">
        
        <div class="form-div">
            <form action="login.php" method="post">
                <div class="inputs-div">
                    <input type="email" name="email" placeholder="email" class="inputs">
                </div>
                <div class="inputs-div">
                <input type="password" name="password" placeholder="password" class="inputs">
                </div>
                <div class="inputs-div">
                    <input type="submit" name="login" value="login" class="btn">
                </div>
            </form>
        </div>
        <div class="wel-div">
            
            <img src="./images/rest.png" alt="Login image" width="300px" height="200px" >

        </div>
       
        </div>
       </section>
        
        <script src="" async defer></script>
    </body>
</html>