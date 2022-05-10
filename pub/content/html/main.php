<?= $this->theme->block('header'); ?>
<div class="d-flex">
    <?= $this->theme->block('offcanvas-sidebar'); ?>
    <div class="d-flex flex-column justify-content-center w-100"><br>
        <div class="container-fluid">
            <?php foreach ($app_config as $app_config_key=>$app_config_value):?>
            <?= $app_config_key.' => '.$app_config_value ?>
            <br>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->theme->block('footer'); ?>
