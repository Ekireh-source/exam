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
        <title>Register</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

        <section>
        <?php
        print_r($_POST);

        if (isset($_POST["submit"])) {
            $fullName = $_POST["fullName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password_confirmation = $_POST["confirm_password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();
            if (empty($fullName) OR empty($email) OR empty($password_confirmation) OR empty($password)) {
                array_push($errors,"The fields are required");
            }
            if ($password !== $password_confirmation) {
                array_push($errors,"Password do not match");
            };
            require_once "database.php";
            if (count($errors)>0) {
                foreach ($errors as  $error) {
                    echo "<div>$error</div>";
            }} else {
                
                $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You are registered successfully.</div>";
                }else{
                    die("Something went wrong");
                }

            };
            

            
        }
        ?>

        <div>
            <form action="register.php" method="post">
                <div>
                    <input type="text" name="fullName" placeholder="Full Name">
                </div>
                <div>
                    <input type="email" name="email" placeholder="email">
                </div>
                <div>
                    <input type="password" name="password" placeholder="password">
                </div>
                <div>
                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                </div>
                <div>
                    <input type="submit" value="Register" name="submit">
                </div>
            </form>
        </div>
        
        </section>
        
        <script src="" async defer></script>
    </body>
</html>