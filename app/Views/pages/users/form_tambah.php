<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Form Tambah Customer</h3>
        </div>
        <form>
            <div class="card-body row ">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer_nama" class="form-label">Username</label>
                        <input type="text" class="form-control" id="customer_nama" name="customer_nama">
                    </div>
                    <div class="form-group">
                        <label for="customer_notelp" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="customer_notelp" name="customer_notelp">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer_alamat" class="form-label">Role</label>
                        <select name="merk_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected">Admin</option>
                            <option>Operator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customer_alamat" class="form-label">Password</label>
                        <input type="text" class="form-control" id="customer_notelp" name="customer_notelp">

                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a type="submit" href="<?= previous_url() ?>" class="btn btn-info">Cancel</a>

            </div>
        </form>
    </div>
    <!-- /.card -->
</div>