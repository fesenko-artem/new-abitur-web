<div class="body-panel-container bg-dark bg-opacity-25" id="my|path|dir">
    <div class="d-flex flex-column file-container">
        <div class="container-fluid file-container-header">
            <ul class="nav">
                <li class="nav-item file-container-back"><span class="nav-link active" type="button"><i class="fa-light fa-folder-arrow-up"></i></span></li>
                <li class="nav-item file-container-home"><span class="nav-link active" type="button"><i class="fa-light fa-house-user"></i></span></li>
                <li class="nav-item"><input class="form-control me-5" id="file_path" value="<?=$environment->path_dir?>" disabled></li>
            </ul>
        </div>
        <div class="container-fluid file-container-body">
            <div class="d-flex file-list flex-wrap">
            </div>
        </div>
    </div>
</div>
<script>
    let old_path = '<?=$environment->path_dir?>';
    let home_path = '<?=$environment->path_dir?>';
    let current_path = '<?=$environment->path_dir?>';
</script>