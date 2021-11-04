<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: pages/login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Sistem Informasi Perpustakaan</title>

    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="wrapper container-fluid overflow-hidden p-0">
        <!-- navbar -->
        <nav id="sidebar" class="c-border-right shadow">
            <div class="logo">
                <img src="asset/images/Logo-Unindra.png" alt="logo unindar">
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="index.php?p=beranda" class="a-link"><i class="fas fa-fw fa-home"></i>Beranda</a>
                </li>
                <li class="label">
                    <span>Data Master</span>
                </li>
                <li>
                    <a href="index.php?p=anggota" class="a-link"><i class="fas fa-fw fa-users"></i>Data Anggota</a>
                </li>
                <li>
                    <a href="index.php?p=buku" class="a-link"><i class="fas fa-fw fa-book"></i>Data Buku</a>
                </li>
                <li class="label">
                    <span>Data Trasaksi</span>
                </li>
                <li>
                    <a href="index.php?p=peminjaman" class="a-link"><i class="fas fa-fw fa-arrow-alt-circle-up"></i>Transaksi Peminjaman</a>
                </li>
                <li>
                    <a href="index.php?p=pengembalian" class="a-link"><i class="fas fa-fw fa-arrow-alt-circle-down"></i>Transaksi Pengembalian</a>
                </li>
                <li class="label">
                    <span>Laporan Transaksi</span>
                </li>
                <li>
                    <a href="pages/logout.php" onclick="return confirm('Apakah anda yakin ingin logout ?');" class="a-link"><i class="fas fa-fw fa-sign-out-alt"></i>Log Out</a>
                </li>
            </ul>
        </nav>
        <!-- end navbar -->

        <!-- Page Content Holder -->
        <div id="content" class="d-flex flex-column min-vh-100">
            <div>
                <div class="d-flex align-items-center mb-5">
                    <div class="align-items-center c-border bg-white p-3 mr-3 shadow">
                        <button type="button" id="sidebarCollapse" class="btn bg-transparent p-0">
                            <i class="fas fa-bars h2 mb-0 text-secondary"></i>
                        </button>
                    </div>
                    <div class="w-100 c-border bg-white p-3 shadow">
                        <h3 class="mb-0 font-weight-bold text-capitalize">Hello, <?= $_SESSION['nama']; ?></h3>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <?php
                $pages_dir = 'pages';
                if (!empty($_GET['p'])) {
                    $pages = scandir($pages_dir, 0);
                    unset($pages[0], $pages[1]);
                    $p = $_GET['p'];
                    if (in_array($p . '.php', $pages)) {
                        include($pages_dir . '/' . $p . '.php');
                    } else {
                        echo 'Halaman Tidak Ditemukan';
                    }
                } else {
                    include($pages_dir . '/beranda.php');
                }
                ?>
            </div>
            <footer class="mt-auto card border-0 shadow">
                <div class="card-body">
                    <span class="text-secondary">Powered By &copy;JWD - Mohamad Salman Farizi - 2021</span>
                </div>
            </footer>
        </div>
    </div>

    <script src="asset/js/jquery.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/jquery.dataTables.js"></script>
    <script src="asset/js/app.js"></script>
</body>

</html>