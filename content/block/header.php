<?= $theme->make_base_tag('!DOCTYPE html',[],'',$theme::DIV_OPEN_BASE_TAG); ?>
<html lang="<?=$app_config['app_lang']?>">
<head>
    <?= $theme->make_base_tag(
        'meta',
        ['charset'=>'utf-8'],
        '',
        $theme::DIV_OPEN_BASE_TAG
    ).
    $theme->make_base_tag(
        'meta',
        ['name'=>'viewport','content'=>'width=device-width, initial-scale=1.0'],
        '',
        $theme::DIV_OPEN_BASE_TAG
    ).
    $theme->make_base_tag(
        'title',
        [],
        '',
        $theme::DIV_CLOSE_BASE_TAG
    ).
    $theme->make_base_tag(
        'link',
        ['rel'=>'shortcut icon','href'=>'/content/img/bsu.ico','type'=>'image/png'],
        '',
        $theme::DIV_OPEN_BASE_TAG
    )?>
</head>
    <body>
        <ext-css>
            <?php Asset::render('css') ?>
        </ext-css>
