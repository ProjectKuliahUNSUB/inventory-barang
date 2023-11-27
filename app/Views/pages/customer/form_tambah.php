<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Form Tambah Customer</h3>
        </div>
        <form>
            <div class="card-body row ">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer_nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="customer_nama" name="customer_nama">
                    </div>
                    <div class="form-group">
                        <label for="customer_notelp" class="form-label">No Telp</label>
                        <input type="text" class="form-control" id="customer_notelp" name="customer_notelp">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer_alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" style="height: 125px;" id="customer_alamat" name="customer_alamat"></textarea>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a type="submit" class="btn btn-info">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>