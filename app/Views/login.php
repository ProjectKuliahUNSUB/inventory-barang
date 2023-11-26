<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('fonts/icomoon/style.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('css/owl.carousel.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh !important;
        }

        .aaaaaaaaaa {
            margin: 0;
            padding: 0;
            height: 100vh !important;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .split-background {
            position: relative;
            width: 100vw;
            height: 100vh;
        }

        .split-background::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top right, #363062, #363062);
            clip-path: polygon(0 100%, 100% 0, 100% 100%);
        }

        .images-mods {
            mix-blend-mode: multiply;
        }

        img {
            box-shadow: none !important;
        }
    </style>
    <title>Inventory Project Login</title>
</head>

<body>
    <div class="split-background aaaaaaaaaa">
        <div class="content ">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6  shadow-off">
                        <img src="assets/logo-2.png" alt="Image" class="images-mods">
                    </div>
                    <div class="col-md-6 contents">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mb-4 text-center">
                                    <h3>INVENTORY PROJECT </h3>
                                    <p class="mb-4">TUGAS KELOMPOK 3 PROJECT FRAMEWORK</p>
                                </div>
                                <form action="dashboard" method="get">
                                    <div class="form-group first">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username">
                                    </div>
                                    <div class="form-group last mb-4">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password">
                                    </div>
                                    <div class="d-flex mb-5 align-items-center  ">
                                        <label class="control control--checkbox mb-0"><span class="caption ">Simpan
                                                Sandi</span>
                                            <input type="checkbox" checked="checked" />
                                            <div class="control__indicator"></div>
                                        </label>
                                        <span class="ml-auto"><a href="#" class="forgot-pass text-black">Lupa
                                                Sandi</a></span>
                                    </div>

                                    <input type="submit" value="Masuk" class="btn btn-block btn-primary">
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row bg-white"></div> -->

    <script>
        $(document).ready(function () {
            $(":input").attr("autocomplete", "off");
        });
    </script>
    <script src="<?= base_url('js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('js/popper.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('js/main.js') ?>"></script>
</body>

</html>