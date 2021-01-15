<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
<?php
require_once ('connect.php');

if (isset($_POST['username']) && isset($_POST['username'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($connection, $query);

    if ($result){
        $smsg = "Регистрация прошла успешно :)";
    } else {
        $fsmsg = "Ошибка :(";
    }
}
?>
    <div class="container">
        <form class="form-signin" METHOD="post">
        <h2 class="reg_text">Регистрация</h2>
            <?php if (isset($smsg)){ ?> <div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div> <?php }?>
            <?php if (isset($fsmsg)){ ?> <div class="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div> <?php }?>
            <input type="text" name="username" class="form-control" placeholder="Ваше имя" required><br>
            <input type="email" name="email" class="form-control" placeholder="Ваш Email" required><br>
            <input type="password" name="password" class="form-control" placeholder="Ваш пароль" required><br>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
            <a href="login.php" class="btn btn-lg btn-primary btn-block">Уже есть аккаунт?</a>
        </form>
    </div>
</body>
</html>
