<div class="card">

    <div class="card-body">
        <table id="table-main" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?php foreach ($fields as $field): ?>
                        <th>
                            <?= ucwords(str_replace('_', ' ', $field)) ?>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <?php foreach ($fields as $field): ?>
                            <td>
                                <?php
                                // Check if the field name contains the string 'harga' and if the value is numeric
                                if (strpos($field, 'harga') !== false && is_numeric($row[$field])) {
                                    echo 'Rp ' . number_format($row[$field], 0, '.', '.');
                                } else {
                                    echo $row[$field] ?? '';
                                }
                                ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <?php foreach ($fields as $field): ?>
                        <th>
                            <?= ucwords(str_replace('_', ' ', $field)) ?>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </tfoot>
        </table>
    </div>
</div>