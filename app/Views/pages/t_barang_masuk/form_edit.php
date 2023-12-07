<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Barang Masuk</h3>
        </div>
        <?= view('components/alerts') ?>

        <?= form_open($role . '/transaksi/barang-masuk/update', ['enctype' => 'multipart/form-data']) ?>
        <input type="text" value="<?= $dataBarangMasuk['id_bm']; ?>" name="id" hidden>
        <div class="card-body row ">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="bm_kode" class="form-label">Kode Masuk</label>
                    <input type="text" class="form-control  " id="bm_kode" name="bm_kode"
                        value="<?= $dataBarangMasuk['kode_masuk']; ?>" disabled>
                    <input type="text" class="form-control  " id="bm_kode" name="bm_kode"
                        value="<?= $dataBarangMasuk['kode_masuk']; ?>" hidden>
                </div>
                <div class=" form-group">
                    <label for="id_barang">Barang</label>
                    <select name="id_barang" class="form-control select2" style="width: 100%;">
                        <?php foreach ($databarang as $barang): ?>
                            <option value="<?= $barang['id_barang'] ?>"
                                <?= $dataBarangMasuk['id_barang'] == $barang['id_barang'] ? 'selected' : '' ?>>
                                <?= $barang['nama_barang'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bm_tanggal" class="form-label">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="bm_tanggal"
                        value="<?= $dataBarangMasuk['tgl_masuk']; ?>" name="bm_tanggal">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="bm_customer" class="form-label">Customer</label>
                    <input type="text" class="form-control" id="bm_customer"
                        value="<?= $dataBarangMasuk['customer']; ?>" name="bm_customer">
                </div>
                <div class="form-group">
                    <label for="bm_jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="bm_jumlah" value="<?= $dataBarangMasuk['jumlah']; ?>"
                        name="bm_jumlah" value="0">
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