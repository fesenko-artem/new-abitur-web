<?= $this->theme->block('header'); ?>
<div class="body-container">
    <?=$this->theme->block('nav-panel/left-navbar')?>
    <div class="body-panel">
        <?=$this->theme->block('nav-panel/body-nav-panel')?>
        <div class="body-panel-container bg-dark bg-opacity-25">
            <?php print_r($environment_links) ?>
        </div>
    </div>
</div>
<?= $this->theme->block('footer'); ?>
