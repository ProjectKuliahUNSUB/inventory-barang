<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Quick Example</h3>
        </div>
        <?= form_open($role . '/users/update', ['enctype' => 'multipart/form-data']) ?>
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
                    <label or="customer_id">Customer</label>
                    <select name="customer_id" class="form-control select2" style="width: 100%;">
                        <option selected="selected">Customer 1</option>
                        <option>Customer 2</option>
                        <option>Customer 3</option>
                        <option>Customer 4</option>
                        <option>Customer 5</option>
                        <option>Customer 6</option>
                        <option>Customer 7</option>
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
                    <input type="date" class="form-control" id="bk_tanggal" name="bk_tanggal">
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