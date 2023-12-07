<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Barang Keluar</h3>
        </div>
        <?= form_open($role . '/transaksi/barang-keluar/update', ['enctype' => 'multipart/form-data']) ?>
        <input type="text" value="<?= $dataBarangKeluar['id_bk']; ?>" name="id" hidden>

        <div class="card-body row ">
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="bk_kode" class="form-label">Kode Keluar</label>

                    <input type="text" class="form-control  " id="bk_kode" name="bk_kode"
                        value="<?= $dataBarangKeluar['kode_keluar'] ?>" disabled>
                    <input type="text" class="form-control  " id="bk_kode" name="bk_kode"
                        value="<?= $dataBarangKeluar['kode_keluar'] ?>" hidden>

                </div>
                <div class="form-group">
                    <label for="id_barang">Barang</label>
                    <select name="id_barang" class="form-control select2" style="width: 100%;">
                        <?php foreach ($databarang as $barang): ?>
                            <option value="<?= $barang['id_barang'] ?>"
                                <?= $dataBarangKeluar['id_barang'] == $barang['id_barang'] ? 'selected' : '' ?>>
                                <?= $barang['nama_barang'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="bk_jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="bk_jumlah" value="<?= $dataBarangKeluar['jumlah'] ?>"
                        name="bk_jumlah">
                </div>

            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="bk_tujuan" class="form-label">Tujuan</label>
                    <textarea style="height: 125px;" type="text" class="form-control" id="bk_tujuan"
                        name="bk_tujuan"><?= $dataBarangKeluar['tujuan'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="bk_tanggal" class="form-label">Tanggal Keluar</label>
                    <input type="date" class="form-control" id="bk_tanggal"
                        value="<?= $dataBarangKeluar['tgl_keluar'] ?>" name="bk_tanggal">
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