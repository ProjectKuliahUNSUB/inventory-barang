<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css'); ?>">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh !important;
        }

        .the-a {
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

        .image-container {
            position: relative;
        }

        /* Loading indicator styling */
        #loadingIndicator {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            /* Ensure the loading indicator is on top of the content */
            /* Add additional styling as needed */
        }

        /* Image styling */
        #selectedImage {
            width: 200px;
            height: 250px;
        }
    </style>
    <title>Inventory Project Login</title>
</head>

<body>
    <div class="split-background the-a">
        <div class="content ">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6  shadow-off">
                        <img src="<?= base_url('assets/logo-2.png') ?>" alt="Image" class="images-mods">
                    </div>
                    <div class="col-md-6 contents ">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="mb-4 text-center">
                                    <h3>INVENTORY PROJECT </h3>
                                    <p class="mb-4">TUGAS KELOMPOK 3 PROJECT FRAMEWORK</p>
                                    <?php if(isset($error)): ?>
                                        <p style="color: red;">
                                            <?php echo $error; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <!-- <form action="dashboard" method="get"> -->
                                <div class="card p-2">
                                    <?= view('components/alerts') ?>
                                    <?= form_open('auth/register', ['enctype' => 'multipart/form-data']) ?>
                                    <div class="row ">

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username">
                                            </div>
                                            <div class="form-group">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" oninput="validatePassword()"
                                                    id="password" name="password" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="customFile">Image</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                        name="image" onchange="displayImage()">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" class="form-label">Role</label>
                                                <select name="role" class="form-control select2" style="width: 100%;">
                                                    <option value="Admin" selected="selected">Admin</option>
                                                    <option value="Operator">Operator</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="confirm_password" class="form-label">Confirm
                                                    Password</label>
                                                <input type="password" class="form-control" id="confirm_password"
                                                    name="confirm_password" oninput="validatePassword()" required>
                                                <p id="passwordError" style="color: red;"></p>
                                            </div>
                                        </div>
                                        <div
                                            class="col-sm-4 text-center d-flex justify-content-center align-items-center row image-container">
                                            <img id="selectedImage" src="//placehold.it/200x250" alt="..."
                                                class="img-thumbnail rounded" />
                                            <img id="loadingIndicator" src="<?= base_url('assets/loading.svg') ?>"
                                                height="60" width="60" class="img-thumbnail rounded" />
                                            <div id="loadingIndicator">Loading...</div>


                                        </div>

                                        <!-- <div class="d-flex mb-5 align-items-center  ">
                                        <label class="control control--checkbox mb-0"><span class="caption ">Simpan
                                                Sandi</span>
                                            <input type="checkbox" checked="checked" />
                                            <div class="control__indicator"></div>
                                        </label>
                                        <span class="ml-auto"><a href="#" class="forgot-pass text-black">Lupa
                                                Sandi</a></span>
                                    </div> -->
                                        <div class="col-md-12">
                                            <input id="submitBtn" type="submit" value="Daftar"
                                                class="btn btn-block btn-primary">
                                        </div>

                                    </div>
                                    <?= form_close() ?>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script defer>
        function displayImage() {
            const fileInput = document.getElementById('customFile');
            const selectedImage = document.getElementById('selectedImage');

            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    selectedImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
        function validatePassword() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const passwordError = document.getElementById('passwordError');
            const submitBtn = document.getElementById('submitBtn');

            if (password !== confirmPassword) {
                passwordError.textContent = 'Passwords do not match';
                submitBtn.disabled = true;
            } else {
                passwordError.textContent = '';
                submitBtn.disabled = false;
            }
        }
    </script>

</body>

</html>