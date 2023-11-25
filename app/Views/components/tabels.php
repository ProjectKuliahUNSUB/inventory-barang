<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <?= $judul ?>
        </h3>
    </div>
    <div class="card-body">
        <table id="table-main" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?php foreach ($fields as $field): ?>
                        <th>
                            <?= $field ?>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <?php foreach ($fields as $field): ?>
                            <td>
                                <?= $row[$field] ?? '' ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <?php foreach ($fields as $field): ?>
                        <th>
                            <?= $field ?>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </tfoot>
        </table>
    </div>
</div>