<?php
if (session()->getFlashdata('errors')):
    foreach (session()->getFlashdata('errors') as $error): ?>
        <div class="alert alert-danger alert-dismissible m-2">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            <div><i class="icon fas fa-ban"></i>
                <?= esc($error) ?>
            </div>

        </div>
    <?php endforeach; endif; ?>