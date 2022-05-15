<div class="nav-panel d-flex flex-column bg-dark bg-opacity-25">
    <ul class="navigation_list">
        <?php foreach ($environment_links as $environment_link):?>
            <li class="navigation_list_item" title="<?=$environment_link->title?>">
                <a href="/<?=$current_environment->path_dir?>/<?=$environment_link->link_name?>">
                    <i class="<?=$environment_link->icon?>"></i>
                    <span class="navigation_list_item_name hidden"><?=$environment_link->title?></span>
                </a>
            </li>
        <?php endforeach;?>
        <!--<ul class="navigation_list_item_list">
            <li><a>jjdjdjdjd</a></li>
            <li><a>jjdjdjdjd</a></li>
            <li><a>jjdjdjdjd</a></li>
            <li><a>jjdjdjdjd</a></li>
        </ul>-->
    </ul>
    <div class="navigation_list user_element">
        <span class="navigation_list_item"><a><i class="fa-light fa-user-bounty-hunter"></i></a></span>
    </div>
    <!--<ul class="navigation_list_item_list user_element">
        <li><a>jjdjdjdjd</a></li>
        <li><a>jjdjdjdjd</a></li>
        <li><a>jjdjdjdjd</a></li>
        <li><a>jjdjdjdjd</a></li>
    </ul>-->
</div>