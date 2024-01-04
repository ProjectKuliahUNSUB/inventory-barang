<?php $role = strtolower(session('user')['role'] ?? ''); ?>
<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Edit User
            </h3>
        </div>
        <?= view('components/alerts') ?>
        <?= form_open($role . '/users/update', ['enctype' => 'multipart/form-data']) ?>
        <input type="text" value="<?= $dataUsers['id']; ?>" name="id" hidden>
        <div class="card-body row ">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" value="<?= $dataUsers['username']; ?>"
                        name="username">
                </div>
                <div class="form-group">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" value="<?= $dataUsers['nama']; ?>" name="nama">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" oninput="validatePassword()" id="password"
                        name="password">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="customFile">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image"
                            onchange="displayImage()">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat" class="form-label">Role</label>
                    <select name="role" class="form-control select2" style="width: 100%;">
                        <option value="Admin" <?= ($dataUsers['role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="Operator" <?= ($dataUsers['role'] == 'Operator') ? 'selected' : ''; ?>>Operator
                        </option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                        oninput="validatePassword()">
                    <p id="passwordError" style="color: red;"></p>
                </div>
            </div>
            <div class="col-sm-4 text-center d-flex justify-content-center align-items-center">
                <input type="text" class="form-control" id="username" value="<?= $dataUsers['img']; ?>" name="imgBase64"
                    hidden>
                <img id="selectedImage"
                    src="<?= isset($dataUsers['img']) && !empty($dataUsers['img']) ? 'data:image/png;base64,' . $dataUsers['img'] : '//placehold.it/200x250'; ?>"
                    style="width: 200px; height: 250px;" alt="..." class="img-thumbnail rounded" />
                <img id="loadingIndicator" src="<?= base_url('assets/loading.svg') ?>" height="60" width="60"
                    class="img-thumbnail rounded" />
                <div id="loadingIndicator">Loading...</div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a type="submit" href="<?= previous_url() ?>" class="btn btn-info">Cancel</a>
        </div>
        <?= form_close() ?>
    </div>
    <!-- /.card -->
</div>
<script defer>
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
    function displayImage() {
        const fileInput = document.getElementById('customFile');
        const selectedImage = document.getElementById('selectedImage');
        const loadingIndicator = document.getElementById('loadingIndicator');

        const file = fileInput.files[0];

        if (file) {
            loadingIndicator.style.display = 'block';

            const reader = new FileReader();
            reader.onloadend = function () {
                const img = new Image();
                img.onload = function () {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    canvas.width = 200;
                    canvas.height = 250;

                    ctx.drawImage(img, 0, 0, 200, 250);

                    selectedImage.src = canvas.toDataURL('image/png');

                    loadingIndicator.style.display = 'none';
                };
                img.src = reader.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>