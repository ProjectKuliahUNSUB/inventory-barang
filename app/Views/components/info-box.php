<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box bg-background-component text-white">
        <span class="info-box-icon <?php echo isset($bg) ? $bg : 'bg-info'; ?> elevation-1"><i
                class="<?php echo isset($icon) ? $icon : 'fas fa-question'; ?>"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">
                <?php echo isset($title) ? $title : 'Default Title'; ?>
            </span>
            <span class="info-box-number">
                <?php echo isset($value) ? $value : 0; ?>
                <small>
                    <?php echo isset($unit) ? $unit : '%'; ?>
                </small>
            </span>
        </div>
    </div>
</div>