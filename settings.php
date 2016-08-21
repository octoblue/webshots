<?php include 'inc/db.php';?>
<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<style>
    .slider-track-high {background-color: rgb(193, 193, 193)!important;}
</style>
<div id="page-content" style="margin-top: -20px; min-height: 1000px;">
    <?php include 'inc/page_head.php'; ?>
    <?php
    $usdrate = Setting::getSettingByName('usdrate');
    $vat = Setting::getSettingByName('vat');
    ?>
    <form action="api.php" method="get">
        <input type="hidden" name="action" value="settings">
        <label class="col-md-2 control-label">USD Rate</label>
        <div class="col-md-4">
            <input type="text" id="usdrate" name="usdrate" class="form-control input-slider" data-slider-min="1490" data-slider-max="1540" data-slider-step="1" data-slider-value="<?php echo $usdrate->value; ?>" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
        </div><br><br>
        <label class="col-md-2 control-label">VAT Rate</label>
        <div class="col-md-4">
            <input type="text" id="vat" name="vat" class="form-control input-slider" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="<?php echo $vat->value; ?>" data-slider-orientation="horizontal" data-slider-selection="before" data-slider-tooltip="show">
        </div><br><br>
        <br><br>
        <div class="col-md-4">
            <input type="submit" class="btn btn-sm btn-success">
        </div>
    </form>
</div>
