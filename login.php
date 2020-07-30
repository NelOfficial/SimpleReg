<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Document</title>
</head>
<body>


<div class="container">
    <form class="form-signin" METHOD="post">
        <h2 class="Log_text">Вход</h2>

        <input type="text" name="username" class="form-control" placeholder="Ваше имя" required><br>
        <input type="password" name="password" class="form-control" placeholder="Ваш пароль" required><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
        <a href="/index.php" class="btn btn-lg btn-primary btn-block">Нет аккаунта? Создайте!</a>
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
        $fmsg = "Ошибка :(. Проверьте правильность написания логина и пароля.";
    }
}
$smsg  = "Авторизация прошла успешно :)";
$fsmsg = "Ошибка :(";

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<h2>Добро пожаловать, " . $username . "! ";
    echo "<p>Вы вошли в аккаунт!</p>";
    echo "<a href='logout.php' class='btn btn-lg btn-primary btn-block' style='width: 94px;'> Выйти </a>";
}

?>
</body>
</html>