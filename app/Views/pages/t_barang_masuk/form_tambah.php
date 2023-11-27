<div class="col-md-12">
    <div class="card bg-sidebar">
        <div class="card-header bg-header">
            <h3 class="card-title text-white">Quick Example</h3>
        </div>






        <form>
            <div class="card-body row ">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="bm_kode" class="form-label">Kode Masuk</label>
                        <input type="text" class="form-control" id="bm_kode" name="bm_kode">
                    </div>
                    <div class="form-group">
                        <label for="barang_kode" class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" id="barang_kode" name="barang_kode">
                    </div>
                </div>
                <div class="col-sm-6">
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
                        <label for="bm_tanggal" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="bm_tanggal" name="bm_tanggal">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="bm_jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="bm_jumlah" name="bm_jumlah">
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