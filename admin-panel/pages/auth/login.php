<?php
session_start();
include '../../include/db.php';


$emailError = '';
$passwordError = '';
$loginError = '';
if(isset($_POST['login'])){
    if(empty($_POST['email'])){
        $emailError = 'لطفا ایمیل را وارد کنید';
    }
    if(empty($_POST['password'])){
        $passwordError = 'لطفا رمز عبور را وارد کنید';
    }
    else{
        $email = $_POST['email'];
        $password = $_POST['password'];
        $users = $connection->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
        $user = $users->fetch_assoc();
        if($user == null){
            $loginError = 'ایمیل یا رمز عبور اشتباه است';
        }
        else{
            $_SESSION['email'] = $email;
            header("location: ../../index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html dir="rtl" lang="fa">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>php tutorial || blog project || webprog.io</title>

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="../../assets/css/style.css" />
    </head>
    <body class="auth">
        <main class="form-signin w-100 m-auto">
            <form method="post">
                <div class="fs-2 fw-bold text-center mb-4">webprog.io</div>
                <div class="text text-warning"><?= $loginError; ?></div>
                <div class="mb-3">
                    <label class="form-label">ایمیل</label>
                    <input name="email" type="email" class="form-control" />
                    <div class="text text-danger"><?= $emailError; ?></div>
                </div>

                <div class="mb-3">
                    <label class="form-label">رمز عبور</label>
                    <input name="password" type="password" class="form-control" />
                    <div class="text text-danger"><?= $passwordError; ?></div>

                </div>
                <button name="login" class="w-100 btn btn-dark mt-4" type="submit">
                    ورود
                </button>
            </form>
        </main>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
