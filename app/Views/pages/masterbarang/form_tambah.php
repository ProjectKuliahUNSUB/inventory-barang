<?php $role = strtolower(session('user')['role'] ?? ''); ?>
<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Tambah Barang
            </h3>
        </div>
        <?= view('components/alerts') ?>
        <?= form_open($role . '/master-barang/save', ['enctype' => 'multipart/form-data']) ?>
        <div class="card-body row ">
            <div class="col-sm-4">
                <div class="form-group">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                </div>
                <div class="form-group">
                    <label for="id_satuan">Satuan</label>
                    <select name="id_satuan" class="form-control select2" style="width: 100%;">
                        <?php foreach ($datasatuan as $satuan): ?>
                            <option wl="<?= $satuan['whitelist'] ?>" value="<?= $satuan['id_satuan'] ?>">
                                <?= $satuan['nama_satuan'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Merk</label>
                    <input type="text" class="form-control" id="merk_barang" name="merk_barang">
                </div>
                <div class="form-group">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga">
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
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" style="height: 210px;" id="keterangan" name="keterangan"></textarea>
                </div>
            </div>
            <div class="col-sm-4 text-center d-flex justify-content-center align-items-center">
                <img id="selectedImage" src="//placehold.it/200x250" alt="..." class="img-thumbnail rounded" />
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