<div class="container-fluid">
    <div class="d-flex flex-column">
        <?php foreach ($environments as $environment): ?>
        <div class="card-item bg-dark bg-opacity-25 d-flex flex-column">
            <?php //print_r($environment) ?>
            <div class="input-group mb-3 text-break">
                <span class="input-group-text text-break" id="card-item-name-<?=$environment->id?>">Название приложения</span>
                <span class="form-control card-item-name" aria-describedby="card-item-name-<?=$environment->id?>"><a href="/developer/environment/show/<?=$environment->id?>"><?=$environment->title?></a></span>
            </div>
            <div class="input-group mb-3 text-break">
                <span class="input-group-text" id="card-item-path-<?=$environment->id?>">Директория приложения</span>
                <span class="form-control card-item-path" aria-describedby="card-item-path-<?=$environment->id?>"><?=$environment->path_dir?></span>
            </div>
            <div class="input-group mb-3 text-break">
                <span class="input-group-text" id="card-item-date-<?=$environment->id?>">Дата создания</span>
                <span class="form-control card-item-date" aria-describedby="card-item-date-<?=$environment->id?>"><?=date_format(date_create($environment->date_create),'d-m-Y G:i:s')?></span>
            </div>
            <div class="input-group mb-3 text-brek">
                <span class="input-group-text" id="card-item-status-<?=$environment->id?>">Статус приложения</span>
                <span class="form-control card-item-status" aria-describedby="card-item-status-<?=$environment->id?>">
                    <?php if($environment->locked_flag):?>
                    <i class="fa-solid fa-signal-bars-slash text-danger"></i>
                    <?php else:?>
                    <i class="fa-solid fa-signal text-success"></i>
                    <?php endif;?>
                </span>
            </div>
            <div class="card-item-footer d-flex flex-fill">
                <button type="button" class="btn btn-info m-2"><a href="/<?=$environment->path_dir?>/">Перейти</a></button>
                <button type="button" class="btn btn-secondary m-2"><a href="/developer/environment/show/<?=$environment->id?>">Просмотр информации</a></button>
                <button type="button" class="btn btn-danger m-2" onclick="environment.lock_confirm(<?=$environment->id?>)">Блокировать</button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>