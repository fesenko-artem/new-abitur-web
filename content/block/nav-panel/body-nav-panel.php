<div class="body-nav-panel bg-dark bg-opacity-25">
    <ul class="nav nav-pills nav-fill body-nav-panel-navigation">
        <?php foreach ($links as $link):?>
            <?php if(isset($link['active'])):?>
                <li class="nav-item"><a class="nav-link active" href="<?=$link['url']?>"><?=$link['name']?></a></li>
            <?php else:?>
                <li class="nav-item"><a class="nav-link" href="<?=$link['url']?>"><?=$link['name']?></a></li>
            <?php endif;?>
        <?php endforeach;?>
    </ul>
</div>