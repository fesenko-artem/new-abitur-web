<?= $this->theme->block('header'); ?>
<div class="body-container">
    <?=$this->theme->block('nav-panel/left-navbar')?>
    <div class="body-panel">
        <?=$this->theme->block('nav-panel/body-nav-panel')?>
        <?=$this->theme->block('developer/environment/list')?>
    </div>
</div>
<?= $this->theme->block('footer'); ?>
