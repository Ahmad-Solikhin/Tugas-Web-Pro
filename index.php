<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
ini_set("display_errors", 1);
define("GELANG", true);

require_once "libraries/connect.php";
require_once "libraries/fungsi.php";

if (isset($_GET['page']) == false) {
    $halaman = "login";
} else {
    $halaman = $_GET['page'];
}

$file_to_open = "pages/" . $halaman;

if (file_exists($file_to_open . ".php") == false) {
    $file_to_open = "pages/404";
}

$unprotected_page = ['login', 'login_proses', 'signup', 'signup_proses', 'about_us', '404', '403'];
$premium_page = ['bin', 'bin_olahraga', 'premium'];

if (in_array($halaman, $premium_page) == true) {
    if ($_SESSION['id_role'] == 1) {
        redirect("?page=403");
    }
}

if (in_array($halaman, $unprotected_page) == false) {
    //cek apakah sudah login
    if (isset($_SESSION['nm_user']) == false) {
        redirect("?page=login&err=2");
    }
}

if ($file_to_open == "pages/welcome") {
    $sub_title = "Welcome";
    $title = "Home";
} elseif ($file_to_open == "pages/tabel" || $file_to_open == "pages/bin" || $file_to_open == "pages/tabel_olahraga" || $file_to_open == "pages/bin_olahraga" || $file_to_open == "pages/tabel_kombinasi") {
    $sub_title = "Tabel";
    $title = $sub_title;
} elseif ($file_to_open == "pages/utama" || $file_to_open == "pages/kedua") {
    $sub_title = "Input";
    $title = $sub_title;
} elseif ($file_to_open == "pages/akun") {
    $sub_title = "Akun";
    $title = $sub_title;
} elseif ($file_to_open == "pages/edit") {
    $sub_title = "Edit Data";
    $title = $sub_title;
} elseif ($file_to_open == "pages/404") {
    $sub_title = "Back Home";
    $title = "Not Found";
} elseif ($file_to_open == "pages/403") {
    $sub_title = "Back Home";
    $title = "Not Permited";
} elseif ($file_to_open == "pages/login") {
    $sub_title = "Login";
    $title = $sub_title;
} elseif ($file_to_open == "pages/signup") {
    $sub_title = "Sign Up";
    $title = $sub_title;
} elseif ($file_to_open == "pages/about_us") {
    $sub_title = "About Us";
    $title = $sub_title;
} elseif ($file_to_open == "pages/premium") {
    $sub_title = "Perhitungan";
    $title = $sub_title;
}


?>

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?php echo $title ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="dark-edition">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black" data-image="assets/img/food-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="?page=welcome" class="simple-text logo-normal">
                    KalorMan
                </a>
            </div>

            <?php
            if (isset($_SESSION['nm_user'])) :
                $is_allow_restore = cek_akses($connection, $_SESSION['id_role'], 'restore');
                $sql = "SELECT * FROM modul_role AS mr JOIN modul as m ON mr.id_modul=m.id_modul WHERE mr.id_role=" . $_SESSION['id_role'] . " AND mr.deleted_at IS NULL AND mr.is_count=1";
                $result = mysqli_query($connection, $sql);
            ?>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="nav-item <?php if ($file_to_open == "pages/welcome") {
                                                echo "active";
                                            } ?> ">
                            <a class="nav-link" href="?page=welcome">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($file_to_open == "pages/utama" || $file_to_open == "pages/kedua") {
                                                echo "active";
                                            } ?> ">
                            <a class="nav-link" href="?page=utama">
                                <i class="material-icons">person</i>
                                <p>Input</p>
                            </a>

                            <!-- <a class="nav-link" href="?page=utama">
                            <i class="material-icons">person</i>
                            <p>Input</p>
                        </a> -->
                        </li>
                        <li class="nav-item <?php if ($file_to_open == "pages/tabel" || $file_to_open == "pages/tabel_olahraga" || $file_to_open == "pages/tabel_kombinasi" || $file_to_open == "pages/bin" || $file_to_open == "pages/bin_olahraga") {
                                                echo "active";
                                            } ?> ">
                            <a class="nav-link" href="?page=tabel">
                                <i class="material-icons">content_paste</i>
                                <p>Table</p>
                            </a>
                        </li>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <li class="nav-item <?php if ($file_to_open == "pages/premium") {
                                                    echo "active";
                                                } ?> ">
                                <a class="nav-link" href="?page=<?php echo $row['nm_modul']; ?>">
                                    <i class="material-icons"><?php echo $row['icon_modul']; ?></i>
                                    <p><?php echo $row['judul_modul']; ?></p>
                                </a>
                            </li>
                        <?php } ?>

                        <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
                    </ul>
                </div>

            <?php endif; ?>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <?php if ($title == "Input") { ?>
                            <a class="navbar-brand nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $title ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="?page=utama">Input Kalori</a>
                                <a class="dropdown-item" href="?page=kedua">Input Olahraga</a>
                            </div>
                        <?php } elseif ($title == "Tabel") { ?>
                            <a class="navbar-brand nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $title ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="?page=tabel">Tabel Kalori</a>
                                <a class="dropdown-item" href="?page=tabel_olahraga">Tabel Olahraga</a>
                                <a class="dropdown-item" href="?page=tabel_kombinasi">Tabel Kombinasi</a>
                                <?php if ($is_allow_restore) : ?>
                                    <a class="dropdown-item" href="?page=bin">Tabel Bin Kalori</a>
                                    <a class="dropdown-item" href="?page=bin_olahraga">Tabel Bin Olahraga</a>
                                <?php endif; ?>
                            </div>
                        <?php } elseif ($title == "Not Found") { ?>
                            <a class="navbar-brand" href="?page=welcome"><?php echo $sub_title ?></a>
                        <?php } elseif ($title == "Not Permited") { ?>
                            <a class="navbar-brand" href="?page=welcome"><?php echo $sub_title ?></a>
                        <?php } else { ?>
                            <a class="navbar-brand" href="<?php $file_to_open . ".php" ?>"><?php echo $title ?></a>
                        <?php } ?>


                        <!-- <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div> -->
                    </div>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="navbar-brand nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <?php
                                    if (isset($_SESSION['nm_user'])) {
                                        // halaman yang bisa diakses saat sudah login
                                        echo '<a class="dropdown-item" href="?page=akun">Profile</a>';
                                        echo '<a class="dropdown-item" href="?page=logout">Logout</a>';
                                    } else {
                                        // halaman yang bisa diakses saat belum login
                                        echo '<a class="dropdown-item" href="?page=login">Log In</a>';
                                        echo '<a class="dropdown-item" href="?page=signup">Sign Up</a>';
                                    }
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <?php
                    include $file_to_open . ".php";
                    ?>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="?page=about_us">
                                    About Us
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right" id="date">
                        , made with <i class="material-icons">favorite</i> by
                        <a href="?page=about_us"> Kelompok 5</a>
                    </div>
                </div>
            </footer>
            <script>
                const x = new Date().getFullYear();
                let date = document.getElementById('date');
                date.innerHTML = '&copy; ' + x + date.innerHTML;
            </script>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="https://unpkg.com/default-passive-events"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-dashboard.js?v=2.1.0"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/demo/demo.js"></script>
    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                $('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script>
</body>

</html>