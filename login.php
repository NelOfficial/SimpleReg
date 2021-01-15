<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Login</title>
</head>
<body>


<div class="container">
    <form class="form-signin" METHOD="post">
        <h2 class="Log_text">Login</h2>

        <input type="text" name="username" class="form-control" placeholder="Your name" required><br>
        <input type="password" name="password" class="form-control" placeholder="Your password" required><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a href="/index.php" class="btn btn-lg btn-primary btn-block">Haven't account? Create!</a>
    </form>
</div>
<?php
require ('connect.php');

if (isset($_POST['username']) and isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $relust = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($relust);

    if ($count == 1) {
        $_SESSION['username'] = $username;
    }else{
        $fmsg = "Error!. Check that the user name and password are spelled correctly.";
    }
}
$smsg  = "Авторизация прошла успешно :)";
$fsmsg = "Ошибка :(";

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<h2>Hello, " . $username . "! ";
    echo "<p>You are logged in!</p>";
    echo "<a href='logout.php' class='btn btn-lg btn-primary btn-block' style='width: 94px;'> Log out </a>";
}

?>
</body>
</html>
