<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <section>
            <div>
                <?php
                if (isset($_POST["register"])) {
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    
                    require_once "database.php";
                    $sql = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    if ($user) {
                        if(password_verify($password, $user["password"])){
                            session_start();
                            $_SESSION["user"] = "yes";
                            header("Location: index.php");
                        }else {
                            echo "<div>Password mismatch</div>";
                        }
                        
                    }else {
                        echo "<div>No User found</div>";
                    }

                
                }
                ?>

                <form action="registration.php" method="post">
                
                    <div>
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    
                    <div>
                        <input type="submit" name="register" value="register">
                    </div>
                </form>
            </div>
        </section>
        <script src="" async defer></script>
    </body>
</html>