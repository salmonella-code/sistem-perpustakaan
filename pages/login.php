<?php
session_start();
include('../controller/connection.php');
include('../controller/authController.php');

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($con, "SELECT username FROM admin WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}


if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($con, "SELECT * FROM admin WHERE username = '$username'");
    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);

        if ($password == $row["password"]) {
            // set session
            $_SESSION["login"] = true;
            $_SESSION["nama"] = $row['nm_admin'];

            // cek remember me
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: ../index.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sistem Informasi Perpustakaan</title>

    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-blue">
    <div class="card m-5 border-0 shadow">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col">
                    <img src="../asset/images/Logo-Unindra.png" alt="logo unindar" class="d-block mx-auto w-25">
                    <div class="text-center">
                        <h3 class="font-weight-bold">Selamat Datang di Sistem Perpustakaan <br> Universitas Indraprasta PGRI</h3>
                        <p>
                            "Arahkanlah perhatianmu kepada didikan, dan telingamu kepada kata-kata pengetahuan.
                            Hai anakku, jika hatimu bijak, hatiku juga bersukacita.
                            Jiwaku bersukaria, kalau bibirmu mengatakan yang jujur.
                            Belilah kebenaran dan jangan menjualnya; demikian juga dengan hikmat, didikan dan pengertian."
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 col-sm">
                    <form action="" method="post">
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Username atau password salah
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <div>
                            <label class="sr-only" for="username">Username</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-fw fa-user"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div>
                            <label class="sr-only" for="password">Password</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-fw fa-key"></i>
                                    </div>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                            <label class="custom-control-label" for="remember">Remember Me</label>
                        </div>

                        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </div>



    <script src="../asset/js/jquery.js"></script>
    <script src="../asset/js/popper.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/jquery.dataTables.js"></script>
    <script src="../asset/js/app.js"></script>
</body>

</html>