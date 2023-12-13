<div class="container-fluid">

    <div class="row">
        <div class="col-10">
            <?= view('components/charts') ?>
            <div class="d-flex flex-wrap bg-background-component rounded">
                <?= $view_content ?? '' ?>
            </div>
        </div>
        <div class="col-2">
            <div>
                <div class=" rounded bg-light mb-3 h-100 text-center p-2 d-flex justify-content-center"">
                    <img
                        src=" <?= isset($barang[0]['img']) && !empty($barang[0]['img']) ? 'data:image/png;base64,' . $barang[0]['img'] : '//placehold.it/200x250'; ?>" style="width: 200px; height: 250px;" alt="..."
                    class="img-thumbnail rounded" />
            </div>
            <form method="post" action="">
                <div class="card bg-light mb-3 h-100">
                    <div class="card-header text-bold">Filter Dashboard</div>
                    <div class="card-body">

                        <div class="form-group">
                            <label>Barang</label>
                            <select name="id_barang" class="form-control select2"
                                style="width: 100%; height:36px !important;">
                                <?php foreach ($databarang as $barang): ?>
                                    <option value="<?= $barang['id_barang'] ?>">
                                        <?= $barang['nama_barang'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <div class="input-group">
                                <input type="text" name="date_range" class="form-control float-right"
                                    id="date-dashboard">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm"><i
                                class="fa-solid fa-filter"></i>Apply</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
</div>