<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <title>Home</title>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg" style="background: blue;">
            <div class="container-fluid">
                <a class="navbar-brand" style="font-weight: bold; color:white" href="/project/?page=welcome">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="/project/?page=utama">Input</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="/project/?page=tabel">Result</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="/project/?page=bin">Bin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white;" href="dashboard.php">Template</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php

        ini_set("display_errors", 1);
        define("GELANG", true);

        require_once "libraries/connect.php";
        require_once "libraries/fungsi.php";

        if (isset($_GET['page']) == false) {
            $halaman = "pages/welcome";
        } else {
            $halaman = "pages/" . $_GET['page'];

            if (file_exists($halaman . ".php") == false) {
                $halaman = "pages/404";
            }
        }

        include $halaman . ".php";
        ?>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    -->
</body>

</html>