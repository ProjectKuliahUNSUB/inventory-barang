<?php $role = strtolower(session('user')['role'] ?? ''); ?>
<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Edit Barang
            </h3>
        </div>
        <?= view('components/alerts') ?>
        <?= form_open($role . '/master-barang/update', ['enctype' => 'multipart/form-data']) ?>
        <input type="text" value="<?= $dataBarang['id_barang']; ?>" name="id" hidden>
        <div class="card-body row ">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                        value="<?= $dataBarang['nama_barang']; ?>">
                </div>
                <div class=" form-group">
                    <label>Satuan</label>
                    <select name="id_satuan" class="form-control select2" style="width: 100%;">
                        <?php foreach ($datasatuan as $satuan): ?>
                            <option value="<?= $satuan['id_satuan'] ?>" <?= $dataBarang['id_satuan'] == $satuan['id_satuan'] ? 'selected' : '' ?>>
                                <?= $satuan['nama_satuan'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <!-- <label   class="form-label">Satuan</label>
                    <input type="text" class="form-control" id="id_satuan" name="id_satuan"
                        value="<?= $dataBarang['id_satuan']; ?>"> -->
                </div>
                <div class=" form-group">
                    <label class="form-label">Merk</label>
                    <input type="text" class="form-control" id="merk_barang" name="merk_barang"
                        value="<?= $dataBarang['merk_barang']; ?>">
                </div>
                <div class="form-group">

                    <label class="form-label">Harga Satuan</label>
                    <input type="number" class="form-control" id="harga" name="harga"
                        value="<?= $dataBarang['harga']; ?>">
                </div>
            </div>
            <div class=" col-sm-4">
                <div class="form-group">
                    <label>Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image"
                            onchange="displayImage()">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Keterangan</label>
                    <textarea class="form-control" style="height: 210px;" id="keterangan"
                        name="keterangan"><?= $dataBarang['keterangan']; ?></textarea>

                </div>
            </div>
            <div class="col-sm-4 text-center d-flex justify-content-center align-items-center">
                <input type="text" class="form-control" id="username" value="<?= $dataBarang['img']; ?>"
                    name="imgBase64" hidden>
                <img id="selectedImage"
                    src="<?= isset($dataBarang['img']) && !empty($dataBarang['img']) ? 'data:image/png;base64,' . $dataBarang['img'] : '//placehold.it/200x250'; ?>"
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