<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Quick Example</h3>
        </div>
        <form>
            <div class="card-body row ">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="jenisbarang_id" class="form-label">Jenis Barang ID</label>
                        <input type="text" class="form-control" id="jenisbarang_id" name="jenisbarang_id">
                    </div>
                    <div class="form-group">
                        <label for="satuan_id" class="form-label">Satuan ID</label>
                        <input type="text" class="form-control" id="satuan_id" name="satuan_id">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label or="merk_id">Merk</label>
                        <select name="merk_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected">Merk 1</option>
                            <option>Merk 2</option>
                            <option>Merk 3</option>
                            <option>Merk 4</option>
                            <option>Merk 5</option>
                            <option>Merk 6</option>
                            <option>Merk 7</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="barang_kode" class="form-label">Barang Kode</label>
                        <input type="text" class="form-control" id="barang_kode" name="barang_kode">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="barang_nama" class="form-label">Barang Nama</label>
                        <input type="text" class="form-control" id="barang_nama" name="barang_nama">
                    </div>
                    <div class="form-group">
                        <label for="barang_harga" class="form-label">Barang Harga</label>
                        <input type="number" class="form-control" id="barang_harga" name="barang_harga">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="barang_stok" class="form-label">Barang Stok</label>
                        <input type="number" class="form-control" id="barang_stok" name="barang_stok">
                    </div>
                    <div class="form-group">
                        <label for="gambar_barang">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar_barang">
                                <label class="custom-file-label" for="gambar_barang">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>