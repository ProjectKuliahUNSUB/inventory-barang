<div class="col-md-6">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Form Tambah Satuan Barang</h3>
        </div>
        <?= view('components/alerts') ?>
        <?= form_open($role . '/satuan/save', ['enctype' => 'multipart/form-data']) ?>
        <div class="card-body row ">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="nama_satuan" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_satuan" name="nama_satuan">
                </div>
                <div class="form-group">
                    <label for="keterangan_satuan" class="form-label">Keterangan</label>
                    <textarea type="text" class="form-control" id="keterangan_satuan"
                        name="keterangan_satuan"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="whitelist_kb" class="form-label">Kategori Barang</label>
                    <input type="text" class="form-control" id="whitelist_kb" name="whitelist_kb" data-role="tagsinput">
                </div>
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