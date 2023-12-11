<div class="container-fluid">

    <div class="row">
        <div class="col-10">
            <?= view('components/charts') ?>
            <div class="d-flex flex-wrap bg-background-component rounded">
                <?= $view_content ?? '' ?>
            </div>
        </div>
        <div class="col-2">
            <div class="card bg-light mb-3 h-100">
                <div class="card-header text-bold">Filter Dashboard</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Barang</label>
                        <select class="form-control select2" style="width: 100%; height:36px !important;">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <div class="input-group">
                            <input type="text" class="form-control float-right" id="date-dashboard">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i
                            class="fa-solid fa-filter"></i>Apply</button>
                </div>
            </div>
        </div>
    </div>
</div>