<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Barang Masuk</h3>
        </div>
        <?= view('components/alerts') ?>

        <?= form_open($role . '/transaksi/barang-masuk/save', ['enctype' => 'multipart/form-data']) ?>
        <div class="card-body row ">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="bm_kode" class="form-label">Kode Masuk</label>
                    <input type="text" class="form-control  " id="bm_kode" name="bm_kode"
                        value="<?= strtoupper('BM-' . $uuid) ?>" disabled>
                    <input type="text" class="form-control  " id="bm_kode" name="bm_kode"
                        value="<?= strtoupper('BM-' . $uuid) ?>" hidden>
                </div>
                <div class="form-group">
                    <label for="id_barang">Barang</label>
                    <select name="id_barang" class="form-control select2" style="width: 100%;">
                        <?php foreach ($databarang as $barang): ?>
                            <option value="<?= $barang['id_barang'] ?>">
                                <?= $barang['nama_barang'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bm_tanggal" class="form-label">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="bm_tanggal" name="bm_tanggal"
                        value="<?= date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="bm_customer" class="form-label">Customer</label>
                    <input type="text" class="form-control" id="bm_customer" name="bm_customer">
                </div>
                <div class="form-group">
                    <label for="bm_jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="bm_jumlah" name="bm_jumlah" value="0">
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