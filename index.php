<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
       <section class="container">
        <div >
            <h1>Welcome to the Dashboard</h1>
            <a href="logout.php">Logout</a>
        </div>
       </section>
        
        <script src="" async defer></script>
    </body>
</html>