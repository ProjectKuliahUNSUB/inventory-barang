<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Edit User
            </h3>
        </div>
        <?= view('components/alerts') ?>
        <?= form_open('/users/update', ['enctype' => 'multipart/form-data']) ?>
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
            </div>
            <div class="col-sm-4 text-center d-flex justify-content-center align-items-center">
                <input type="text" class="form-control" id="username" value="<?= $dataUsers['img']; ?>" name="imgBase64"
                    hidden>
                <img id="selectedImage"
                    src="<?= isset($dataUsers['img']) && !empty($dataUsers['img']) ? 'data:image/png;base64,' . $dataUsers['img'] : '//placehold.it/200x250'; ?>"
                    style="width: 200px; height: 250px;" alt="..." class="img-thumbnail rounded" />
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
</script>