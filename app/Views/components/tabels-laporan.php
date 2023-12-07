<div class="card bg-sidebar">
    <div class="card-body">
        <table id="<?= $customclass ?? 'table-main' ?>" class="table table-bordered table-striped">
            <thead>
                <?php if (isset($header)) { ?>
                    <tr>
                        <?php foreach ($header as $field): ?>
                            <th>
                                <?= ucwords(str_replace('_', ' ', $field)) ?>
                            </th>
                        <?php endforeach; ?>

                    </tr>
                <?php } else { ?>
                    <tr>
                        <?php foreach ($fields as $field): ?>
                            <th>
                                <?= ucwords(str_replace('_', ' ', $field)) ?>
                            </th>
                        <?php endforeach; ?>

                    </tr>
                <?php } ?>

            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <?php foreach ($fields as $field): ?>
                            <td>
                                <?php
                                [$columnName, $unit] = is_array($field) ? $field : [$field, null];

                                if (strpos($columnName, 'harga') !== false && is_numeric($row[$columnName])) {
                                    echo 'Rp ' . number_format($row[$columnName], 0, '.', '.');
                                } elseif ($unit !== null) {
                                    if (is_numeric($row[$columnName])) {
                                        echo number_format($row[$columnName], 0, '.', '.') ?? 0;
                                    }
                                    echo ' (' . $row[$unit] . ')';
                                } elseif (is_numeric($row[$columnName])) {
                                    echo number_format($row[$columnName], 0, '.', '.') ?? 0;
                                } else {
                                    echo $row[$columnName] ?? '';
                                }
                                ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <?php if (isset($header)) { ?>
                    <tr>
                        <?php foreach ($header as $field): ?>
                            <th>
                                <?= ucwords(str_replace('_', ' ', $field)) ?>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <?php foreach ($fields as $field): ?>
                            <th>
                                <?= ucwords(str_replace('_', ' ', $field)) ?>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                <?php } ?>
            </tfoot>
        </table>
    </div>
</div>