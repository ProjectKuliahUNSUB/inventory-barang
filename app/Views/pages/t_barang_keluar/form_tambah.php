<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Barang Keluar</h3>
        </div>
        <?= view('components/alerts') ?>

        <?= form_open($role . '/transaksi/barang-keluar/save', ['enctype' => 'multipart/form-data']) ?>
        <div class="card-body row ">
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="bk_kode" class="form-label">Kode Keluar</label>

                    <input type="text" class="form-control  " id="bk_kode" name="bk_kode"
                        value="<?= strtoupper('BK-' . $uuid) ?>" disabled>
                    <input type="text" class="form-control  " id="bk_kode" name="bk_kode"
                        value="<?= strtoupper('BK-' . $uuid) ?>" hidden>

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
                    <label for="bk_jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="bk_jumlah" name="bk_jumlah">
                </div>

            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="bk_tujuan" class="form-label">Tujuan</label>
                    <textarea style="height: 125px;" type="text" class="form-control" id="bk_tujuan"
                        name="bk_tujuan"></textarea>
                </div>
                <div class="form-group">
                    <label for="bk_tanggal" class="form-label">Tanggal Keluar</label>
                    <input type="date" class="form-control" id="bk_tanggal" name="bk_tanggal"
                        value="<?= date('Y-m-d'); ?>">

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