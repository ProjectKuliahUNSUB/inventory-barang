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
                                [$columnName, $unit] = is_array($field) ? $field : [$field, null];

                                if (strpos($columnName, 'harga') !== false && is_numeric($row[$columnName])) {
                                    echo 'Rp ' . number_format($row[$columnName], 0, '.', '.');
                                } elseif ($unit !== null) {
                                    echo $row[$columnName] ?? '';
                                    echo ' (' . $row[$unit] . ')';
                                } else {
                                    echo $row[$columnName] ?? '';
                                }
                                ?>
                            </td>
                        <?php endforeach; ?>
                        <td class="text-center">
                            <?php
                            $currentUrl = current_url();
                            $imgSrc = isset($row['img']) && !empty($row['img']) ? 'data:image/png;base64,' . $row['img'] : '//placehold.it/200x250';
                            ?>
                            <a class="btn btn-info btn-xs" rel="popover" data-img="<?= $imgSrc ?>"><i
                                    class="fa-solid fa-image "></i></a> |
                            <a href="<?= esc($currentUrl . '/edit/' . $row[$primaryKey]) ?>" class="btn btn-success btn-xs">
                                <i class="fa-regular fa-pen-to-square mr-2"></i>Edit
                            </a> |
                            <a href="#" onclick="confirmDelete('<?= esc($currentUrl . '/delete/' . $row[$primaryKey]) ?>')"
                                class="btn btn-danger btn-xs">
                                <i class="fa-solid fa-trash mr-2"></i>Delete
                            </a>
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