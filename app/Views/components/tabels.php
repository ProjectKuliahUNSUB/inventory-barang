<div class="card bg-sidebar">
    <div class="card-body">
        <table id="table-main" class="table table-bordered table-striped">
            <thead>
                <?php if (isset($header)) { ?>
                    <tr>
                        <?php foreach ($header as $field): ?>
                            <th>
                                <?= ucwords(str_replace('_', ' ', $field)) ?>
                            </th>
                        <?php endforeach; ?>
                        <th>
                            Tools
                        </th>

                    </tr>
                <?php } else { ?>
                    <tr>
                        <?php foreach ($fields as $field): ?>
                            <th>
                                <?= ucwords(str_replace('_', ' ', $field)) ?>
                            </th>
                        <?php endforeach; ?>
                        <th>
                            Tools
                        </th>

                    </tr>
                <?php } ?>

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
                        <td>
                            Tools
                        </td>
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
                        <th>
                            Tools
                        </th>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <?php foreach ($fields as $field): ?>
                            <th>
                                <?= ucwords(str_replace('_', ' ', $field)) ?>
                            </th>
                        <?php endforeach; ?>
                        <th>
                            Tools
                        </th>
                    </tr>
                <?php } ?>
            </tfoot>
        </table>
    </div>
</div>