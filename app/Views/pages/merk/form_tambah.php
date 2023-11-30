<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Form Tambah Merk Barang</h3>
        </div>
        <form>
            <div class="card-body row ">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="jenisbarang_nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="jenisbarang_nama" name="jenisbarang_nama">
                    </div>
                    <div class="form-group">
                        <label for="jenisbarang_ket" class="form-label">Keterangan</label>
                        <textarea type="text" class="form-control" id="jenisbarang_ket" name="jenisbarang_ket"></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a type="submit" href="<?=  previous_url()?>" class="btn btn-info">Cancel</a>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>