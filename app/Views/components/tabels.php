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
                        <th class="text-center">
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
                        <th class="text-center">
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
                        <td class="text-center">
                            <button class="elevation-1 btn btn-success btn-sm"><i class="fa-regular fa-pen-to-square mr-2"></i>Edit</button> | 
                            <button class="elevation-1 btn btn-danger btn-sm"><i class="fa-solid fa-trash mr-2"></i>Delete</button>
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
                        <th class="text-center">
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
                        <th class="text-center">
                            Tools
                        </th>
                    </tr>
                <?php } ?>
            </tfoot>
        </table>
    </div>
</div>