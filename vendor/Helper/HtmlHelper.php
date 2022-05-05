<?php

namespace Vendor\Helper;

use Vendor\Helper\BasicHelper;

class HtmlHelper
{
    public static function setLabel( $class, $control, $label ): string
    {
        return '<label class="'.$class.'" for="'.$control.'">'.$label.'</label>';
    }
    public static function setInput( $type, $class, $control, $help, $placeholder, $value, $events = NULL, $isDisabled = FALSE): string
    {
        if( !empty($type) && !empty($class) && !empty($control) ) {
            $event_text = '';
            if(is_array($events) && count($events) > 0) {
                $event_text = '<script>';
                foreach ($events as $event_name => $event_code) {
                    $event_text .= '$("#'.$control.'").on("'.$event_name.'", function(){'.$event_code.'});';
                    $event_text .= '$("#'.$control.'").trigger("'.$event_name.'");';
                }
                $event_text .= '</script>';
            }

            if($isDisabled === TRUE) {
                $disabled = ' readonly ';
            } else {
                $disabled = '';
            }

            return '<input '.$disabled.' type="'.$type.'" class="'.$class.'"'.
                ( ( isset($help) ) ? ' aria-describedby="'.$control.'HelpBlock"' : '' ).
                ' id="'.$control.'" name="'.$control.'"'.
                ( ( isset($placeholder) ) ? ' placeholder="'.$placeholder.'"' : '' ).
                ' value="'.$value.'">'.$event_text;
        }

        return '<p class="text-danger">HTML_Helper.setInput - На входе недостаточно данных!</p>';
    }
    public static function setSubmit( $class, $id, $text, $tooltip = NULL ): string
    {
        if( !empty($class) && !empty($id) && !empty($text) ) {
            if( empty($tooltip) ) {
                return '<button type="submit" class="'.$class.'" id="'.$id.'" name="'.$id.'">'.$text.'</button> ';
            }

            return '<button type="submit" class="'.$class.'" id="'.$id.'" name="'.$id.'" data-toggle="tooltip" title="'.$tooltip.'">'.$text.'</button> ';
        }

        return '<p class="text-danger">HTML_Helper.setSubmit - На входе недостаточно данных!</p>';
    }
    public static function setButton( $class, $id, $text, $tooltip = NULL ): string
    {
        if( !empty($id) && !empty($text) ) {
            if( empty($tooltip) ) {
                return '<button type="button" class="'.$class.'" id="'.$id.'" name="'.$id.'">'.$text.'</button> ';
            }

            return '<button type="button" class="'.$class.'" id="'.$id.'" name="'.$id.'" data-toggle="tooltip" title="'.$tooltip.'">'.$text.'</button> ';
        }

        return '<p class="text-danger">HTML_Helper.setButton - На входе недостаточно данных!</p>';
    }
    public static function setHrefText( $controller, $action, $text, $tooltip = NULL ): string
    {
        if( !empty($controller) && !empty($action) && !empty($text) ) {
            if( empty($tooltip) ) {
                return '<p><a href="'.BasicHelper::appUrl($controller, $action).'" class="font-weight-bold text-secondary">'.$text.'</a></p> ';
            }

            return '<p><a data-toggle="tooltip" title="'.$tooltip.'" href="'.BasicHelper::appUrl($controller, $action).'" class="font-weight-bold text-secondary">'.$text
                .'</a></p> ';
        }

        return '<p class="text-danger">HTML_Helper.setHrefText - На входе недостаточно данных!</p>';
    }
    public static function setHrefButton( $controller, $action, $class, $text, $tooltip = NULL, $type = null ): string
    {
        if( !empty($controller) && !empty($action) && !empty($class) && !empty($text) && $type == null ) {
            if( empty($tooltip) ) {
                return '<a href="'.BasicHelper::appUrl($controller, $action).'" class="'.$class.'">'.$text.'</a> ';
            }
            return '<a data-toggle="tooltip" title="'.$tooltip.'" href="'.BasicHelper::appUrl($controller, $action).'" class="'.$class.'">'.$text.'</a> ';

        } elseif ($type == 'js') {
            return '<span type="button" data-toggle="tooltip" title="'.$tooltip.'" onclick="'.$controller.$action.'" class="'.$class.'">'.$text.'</span> ';
        }

        return '<p class="text-danger">HTML_Helper.setHrefButton - На входе недостаточно данных!</p>';
    }
    public static function setHrefButtonIcon( $controller, $action, $class, $icon, $tooltip = NULL,$onclick = null, $new_page = 0 ): string
    {
        if( !empty($controller) && !empty($action) && !empty($class) && !empty($icon) ) {
            if( $new_page === 0 ) {
                return '<a data-toggle="tooltip" title="'.$tooltip.'" onclick="'.$onclick.'" href="'.BasicHelper::appUrl($controller, $action).'" class="'.$class.'"><i class="'.$icon.'"></i></a> ';
            }

            return '<a data-toggle="tooltip" title="'.$tooltip.'" href="'.BasicHelper::appUrl($controller, $action).'" class="'.$class.'" target="_blank"><i class="'.$icon
                .'"></i></a> ';
        } elseif (empty($action) && !empty($class) && !empty($icon)){
            return '<a data-toggle="tooltip" title="'.$tooltip.'" onclick="'.$onclick.'" class="'.$class.'"><i class="'.$icon.'"></i></a> ';
        }

        return '<p class="text-danger">HTML_Helper.setHrefButtonIcon - На входе недостаточно данных!</p>';
    }
    public static function setUrlHrefButtonIcon( $url, $class, $icon, $tooltip = NULL, $new_page = 0 ): string
    {
        if( !empty($url) && !empty($class) && !empty($icon) ) {
            if( $new_page === 0 ) {
                return '<a data-toggle="tooltip" title="'.$tooltip.'" href="'.$url.'" class="'.$class.'"><i class="'.$icon.'"></i></a> ';
            }

            return '<a data-toggle="tooltip" title="'.$tooltip.'" href="'.$url.'" class="'.$class.'" target="_blank"><i class="'.$icon
                .'"></i></a>';
        }

        return '<p class="text-danger">HTML_Helper.setHrefButtonIcon - На входе недостаточно данных!</p>';
    }
    public static function setImageLOB( $type, $lob, $width = NULL, $height = NULL ): string
    {
        if( !empty($type) && !empty($lob) ) {
            return '<br><img class="img-fluid" src="data:'.$type.';base64,'.base64_encode($lob).'" width="'.( ( empty($width) ) ? 460 : $width ).'" height="'.( ( empty($height) )
                    ? 345 : $height ).'">';
        }

        return '<p class="text-danger">HTML_Helper.setImageLOB - На входе недостаточно данных!</p>';
    }
    public static function setPdfLOB( $type, $lob, $width = NULL, $height = NULL ): string
    {
        if( !empty($type) && !empty($lob) ) {
            return '<br><embed src="data:'.$type.';base64,'.base64_encode($lob).'" width="'.( ( empty($width) ) ? 460 : $width ).'" height="'.( ( empty($height) )
                    ? 345 : $height ).'">';
        }

        return '<p class="text-danger">HTML_Helper.setImageLOB - На входе недостаточно данных!</p>';
    }
    public static function setGridDB( $rules ): string
    {
        if( isset($rules) && is_array($rules) ) {
            $result = '';
            // using model
            $model = new $rules['model_class']();
            // using model method
            $method = $rules['model_method'];
            // action create
            if( isset($rules['action_add']) ) {
                $button_label = $rules['button_label'] ?? 'Добавить';
                $result = self::setHrefButton($rules['controller'], $rules['action_add'], 'btn btn-success btn-add', $button_label, $button_label);
            } else {
                $result = '';
            }
            // using model filter
            if( isset($rules['model_filter'], $rules['model_filter_var']) ) {
                $filter         = $rules['model_filter'];
                $model->$filter = $rules['model_filter_var'];
            }
            // fetching data
            $table = $model->$method();
            if (!$table) {
                return $result;
            }

            if( isset($rules['id']) && !empty($rules['id']) ) {
                $result .= '<table class="table table-bordered table-hover" id="'.$rules['id'].'" name="'.$rules['id'].'">';
            } else {
                $result .= '<table class="table table-bordered table-hover" id="gridDb" name="gridDb">';
            }
            /* header */
            $result .= '<thead class="thead-dark">';
            $result .= '<tr>';
            $grid   = $rules['grid'];
            foreach( $model->$grid() as $key => $value ) {
                $result .= '<th class="align-text-top">'.$value['name'].'</th>';
            }
            $result .= '</tr>';
            $result .= '</thead>';

            /* data */
            if( $table ) {
                foreach( $table as $table_row ) {
                    $result .= '<tr>';
                    foreach( $model->$grid() as $key => $value ) {
                        if ($key === '_actions'){
                            continue;
                        }
                        switch ( $value['type'] ) {
                            case 'lob':
                                if( !empty($table_row[$key]) ) {
                                    $result .= '<td><img class="img-fluid" src="data:'.( $table_row['file_type'] ?? '' ).';base64,'.base64_encode($table_row[$key])
                                        .'" width="80" height="100"></td>';
                                } else {
                                    $result .= '<td>Файл не загружен</td>';
                                }
                                break;
                            case 'date':
                                if( isset($value['format']) && !empty($value['format']) ) {
                                    $result .= '<td>'.date($value['format'], strtotime($table_row[$key])).'</td>';
                                } else {
                                    $result .= '<td>'.$table_row[$key].'</td>';
                                }
                                break;
                            default:
                                $result .= '<td '.HTML_Helper::getStyle($key, $table_row[$key], $table_row, $rules).'>'. self::getContent($key, $table_row[$key], $table_row, $rules).'</td>';
                        }
                    }
                    // actions
                    if( isset($table_row['id']) && ( isset($rules['action_edit']) || isset($rules['action_delete']) ) ) {
                        $result .= '<td>';
                        // action edit
                        if( isset($rules['action_edit']) ) {
                            if (self::canBeDisplayed($table_row, $rules, 'action_edit')) {
                                //edit mode
                                $btn_style = 'far fa-edit fa-2x';
                                $btn_tooltip = 'Редактировать';
                                $mode = self::getEditMode($table_row, $rules);
                                if ($mode === 2){
                                    $btn_style = 'fas fa-sync fa-2x';
                                    $btn_tooltip = 'Изменить или отозвать';
                                }
                                $result .= self::setHrefButtonIcon($rules['controller'],
                                    $rules['action_edit'].'/?id='.$table_row['id'].( ( isset($table_row['pid']) ) ? '&pid='.$table_row['pid']
                                        : '' ), 'font-weight-bold', $btn_style, $btn_tooltip);
                            }
                            else{
                                //view mode
                                if ($table_row['type'] == 'Заявление на отзыв документов'){
                                    $result .= self::setHrefButtonIcon($rules['controller'],
                                        'Recall/?id='.$table_row['id'].( ( isset($table_row['pid']) ) ? '&pid='.$table_row['pid']
                                            : '' ), 'font-weight-bold', 'far fa-eye fa-2x', 'Просмотреть');
                                }
                                else {
                                    $result .= self::setHrefButtonIcon($rules['controller'],
                                        $rules['action_edit'].'/?id='.$table_row['id'].( ( isset($table_row['pid']) ) ? '&pid='.$table_row['pid']
                                            : '' ), 'font-weight-bold', 'far fa-eye fa-2x', 'Просмотреть');
                                }
                            }
                        }
                        // action delete
                        if( isset($rules['action_delete']) && self::canBeDisplayed($table_row, $rules, 'action_delete') ) {
                            $result .= self::setHrefButtonIcon($rules['controller'],
                                $rules['action_delete'].'/?id='.$table_row['id'].( ( isset($table_row['pid']) ) ? '&pid='.$table_row['pid']
                                    : '' ).'&hdr='.$rules['home_hdr'].'&ctr='.$rules['controller'], 'text-danger font-weight-bold',
                                'fas fa-times fa-2x', 'Удалить');
                        }
                        $result .= '</td>';
                    }
                    $result .= '</tr>';
                }
            }
            $result .= '</table>';

            return $result;
        }

        return '<p class="text-danger">HTML_Helper.setGridDB - На входе не массив!</p>';
    }
    public static function canBeDisplayed( $row, $rules, $action ): bool
    {
        if( $rules['model_class'] == 'common\\models\\Model_Application' ) {
            switch ( $action ) {
                case 'action_delete':
                    if( in_array($row['status'], [ 'Новое', 'Принято', 'Отклонено', 'Сохранено', 'Изменено', 'Отозвано' ]) ) {
                        if( ( $row['type'] != 'Заявление на приём документов' && ($row['status'] == 'Принято' || $row['status'] == 'Отклонено') )
                            || ( ($row['type'] == 'Заявление на приём документов' || $row['type'] == 'Заявление на изменение документов')
                                && in_array($row['status'], [ 'Принято', 'Отклонено', 'Изменено', 'Отозвано' ]) ) ) {
                            return FALSE;
                        }

                        return TRUE;
                    }

                    return FALSE;
                    break;
                case 'action_edit':
                    if ($row['active'] == 1) {
                        if ($row['status'] == 'Новое' || $row['status'] == 'Сохранено') {
                            return TRUE;
                        }
                        if ($row['status'] == 'Принято' && ($row['type'] == 'Заявление на приём документов' || $row['type'] == 'Заявление на изменение документов')) {
                            return TRUE;
                        }
                    }
                    return FALSE;
                    break;
                default:
                    return TRUE;
                    break;
            }
        } else {
            return TRUE;
        }
    }
    public static function getEditMode( $row, $rules )
    {
        if( $rules['model_class'] == 'common\\models\\Model_Application' ) {
            if ($row['status'] == 'Новое' || $row['status'] == 'Сохранено') {
                return 1;
            }
            if ($row['status'] == 'Принято' && ($row['type'] == 'Заявление на приём документов' || $row['type'] == 'Заявление на изменение документов')) {
                return 2;
            }
        }
        return 0;
    }
    public static function getContent($key, $value, $row, $rules){
        if($rules['model_class'] == 'common\\models\\Model_Application') {
            if ($key == 'status'){
                if ($row['type'] == 'Заявление на отзыв документов' && $row['status'] == 'Принято'){
                    return 'Отзыв&nbsp;принят';
                }
                if ($row['status'] == 'Новое' || $row['status'] == 'Сохранено') {
                    return 'Черновик';
                }
            }
            return $value;
        }
        else if ($rules['model_class'] == 'common\\models\\Model_ApplicationConfirm') {
            if ($key == 'status'){
                if ($row['type'] == 'Отзыв согласия' && $row['status'] == 'Принято'){
                    return 'Отзыв&nbsp;принят';
                }
            }
            return $value;
        }
        return $value;
    }
    public static function getStyle($key, $value, $row, $rules){
        if($rules['model_class'] == 'common\\models\\Model_Application') {
            if ($key == 'status') {
                $style = 'class="app_status';
                if ($row['type'] == 'Заявление на отзыв документов' && $row['status'] == 'Принято'){
                    $style .= ' app_status-recall_accepted';
                } elseif ($row['status'] == 'Новое' || $row['status'] == 'Сохранено') {
                    $style .= ' app_status-draft';
                }
                elseif ($row['status'] == 'Принято') {
                    $style .= ' app_status-accepted';
                }
                elseif ($row['status'] == 'Отправлено') {
                    $style .= ' app_status-sended';
                }
                elseif ($row['status'] == 'Изменено') {
                    $style .= ' app_status-changed';
                }
                elseif ($row['status'] == 'Отозвано') {
                    $style .= ' app_status-recalled';
                }
                elseif ($row['status'] == 'Отклонено') {
                    $style .= ' app_status-rejected';
                }

                $style .= '"';
                return $style;
                //$style = 'style ="color:#ba0000; font-weight:bold;"';
            }
        }
        else if ($rules['model_class'] == 'common\\models\\Model_ApplicationConfirm') {
            if ($key == 'status'){
                $style = 'class="app_status';
                if ($row['type'] == 'Отзыв согласия' && $row['status'] == 'Принято'){
                    $style .= ' app_status-recall_accepted';
                } elseif ($row['status'] == 'Нет' || $row['status'] == 'Новое' || $row['status'] == 'Сохранено') {
                    $style .= ' app_status-draft';
                }
                elseif ($row['status'] == 'Принято') {
                    $style .= ' app_status-accepted';
                }
                elseif ($row['status'] == 'Отправлено') {
                    $style .= ' app_status-sended';
                }
                elseif ($row['status'] == 'Отклонено') {
                    $style .= ' app_status-rejected';
                }

                $style .= '"';
                return $style;
            }
        }
        return '';
    }
    public static function setTableBegin( $id = NULL ): string
    {
        if( !empty($id) ) {
            return '<table class="table table-bordered table-hover" id="'.$id.'" name="'.$id.'">';
        }

        return '<table class="table table-bordered table-hover">';
    }
    public static function setTableHeader( $rules ): string
    {
        if( isset($rules) && is_array($rules) ) {
            if( isset($rules['grid']) && !empty($rules['grid']) && is_array($rules['grid']) ) {
                if( isset($rules['class']) && !empty($rules['class']) ) {
                    $result = '<thead class="'.$rules['class'].'">';
                } else {
                    $result = '<thead>';
                }
                $result .= '<tr>';
                foreach( $rules['grid'] as $key => $value ) {
                    $result .= '<th class="align-text-top">'.$value['name'].'</th>';
                }
                $result .= '</tr>';
                $result .= '</thead>';

                return $result;
            }

            return '<p class="text-danger">HTML_Helper.setTableHeader - Нет данных для создания заголовка!</p>';
        }

        return '<p class="text-danger">HTML_Helper.setTableHeader - На входе не массив!</p>';
    }
    public static function setTableRow( $rules )
    {
        if( isset($rules) && is_array($rules) ) {
            if( ( isset($rules['grid']) && !empty($rules['grid']) && is_array($rules['grid']) ) || ( isset($rules['row']) && !empty($rules['row']) && is_array($rules['row']) ) ) {
                $result = '<tr>';
                foreach( $rules['grid'] as $key => $value ) {
                    switch ( $value['type'] ) {
                        case 'date':
                            if( isset($value['format']) && !empty($value['format']) ) {
                                $result .= '<td>'.date($value['format'], strtotime($rules['row'][$key])).'</td>';
                            } else {
                                $result .= '<td>'.$rules['row'][$key].'</td>';
                            }
                            break;
                        default:
                            $result .= '<td>'.$rules['row'][$key].'</td>';
                    }
                }
                if( isset($rules['controls']) && !empty($rules['controls']) && is_array($rules['controls']) ) {
                    $result .= '<td>';
                    foreach( $rules['controls'] as $control ) {
                        $result .= self::setHrefButtonIcon($control['controller'], $control['action'], $control['class'], $control['icon'], $control['tooltip']);
                    }
                    $result .= '</td>';
                }
                $result .= '</tr>';

                return $result;
            }

            return '<p class="text-danger">HTML_Helper.setTableRow - Нет данных для создания строки!</p>';
        }

        return '<p class="text-danger">HTML_Helper.setTableRow - На входе не массив!</p>';
    }
    public static function setTableEnd(): string
    {
        return '</table>';
    }
    public static function setPagination( $rules ): string
    {
        if( isset($rules) && is_array($rules) ) {
            // using model
            $model = new $rules['model_class']();
            // using model data method
            $method_data = $rules['model_data_method'];
            /* data */
            // using model filter
            if( isset($rules['model_filter']) && isset($rules['model_filter_var']) ) {
                $filter         = $rules['model_filter'];
                $model->$filter = $rules['model_filter_var'];
            }
            // fetching data
            $table = $model->$method_data();
            if( $table ) {
                if( !isset($rules['model_page_method']) || empty($rules['model_page_method']) ) {
                    return '<p class="text-danger">HTML_Helper.setPagination - Метод определения страницы не указан!</p>';
                }
                if( isset($rules['id']) ) {
                    $method_page = $rules['model_page_method'];
                    if( isset($filter) && !empty($filter) ) {
                        $model->$filter = $rules['id'];
                    }
                    $page_current = $model->$method_page();
                } else {
                    return '<p class="text-danger">HTML_Helper.setPagination - Текущий идентификатор не указан!</p>';
                }
                $rows         = '';
                $pages        = '<ul class="pagination justify-content-center">';
                $method_rows  = $rules['model_rows_method'];
                $max_id_value = $model->$method_rows();

                $i = $max_id_value;//$i = 0;
                foreach( $table as $table_row ) {
                    // start page
                    if( $i === $max_id_value /*$i === 0*/ ) {
                        $id_min = $table_row['id'];
                        if( isset($filter) && !empty($filter) ) {
                            $model->$filter = $table_row['id'];
                        }
                        $page = $model->$method_page();
                        if( $page !== 1 ) {
                            $pages .= '<li class="page-item"><a class="page-link" href="Index/?id='.$id_min.'&step=prev">Previous</a></li>';
                        }
                    }
                    // current page
                    if( $i % $rules['rows'] === 0 ) {
                        if( $page === $page_current ) {
                            // mark page active
                            $pages .= '<li class="page-item active"><a class="page-link" href="Index/?id='.$table_row['id'].'&step=next">'.explode('.',$page)[0].'</a></li>';
                            // create rows marker start
                            if( isset($rules['model_rowsless_method']) && !empty($rules['model_rowsless_method']) && isset($rules['model_rows_method'])
                                && !empty($rules['model_rows_method']) ) {
                                if( isset($filter) && !empty($filter) ) {
                                    $model->$filter = $rules['id'];
                                }
                                $method_rowsless = $rules['model_rowsless_method'];
                                $rows            .= '<strong>'.$model->$method_rowsless().' - ';
                            }
                        } else {
                            // mark page inactive
                            $pages .= '<li class="page-item"><a class="page-link" href="Index/?id='.$table_row['id'].'&step=next">'.explode('.',$page)[0].'</a></li>';
                        }
                        $page++;
                    }
                    if( $i === $method_rows ) {
                        //$id_min = $table_row['id'];
                        $id_max = $table_row['id'];
                    } else {
                        $id_max = $table_row['id'];
                    }
                    $i--;
                }
                // create rows marker end
                $rows .= $i.' из '.$model->$method_rows().'</strong>';
                // using model count method
                $method_count = $rules['model_count_method'];
                if( $page !== $model->$method_count() && ( $page - 1 ) !== 1 ) {
                    $pages .= '<li class="page-item"><a class="page-link" href="Index/?id='.$id_max.'&step=next">Next</a></li>';
                }
                $pages .= '</ul>';

                return $rows.$pages;
            }

            return '<p class="text-danger">HTML_Helper.setPagination - Нет данных для пагинации!</p>';
        }

        return '<p class="text-danger">HTML_Helper.setPagination - На входе не массив!</p>';
    }
    public static function setAlert( $msg, $class )
    {
        if( !empty($msg) && !empty($class) ) {
            return '<div class="alert '.$class.'">'.$msg.'</div>';
        }

        return NULL;
    }
    public static function setInvalidFeedback( $err )
    {
        if( $err ) {
            return '<div class="invalid-feedback">'.$err.'</div>';
        }

        return NULL;
    }
    public static function setValidFeedback( $err, $msg )
    {
        if( !$err ) {
            return '<div class="valid-feedback">'.$msg.'</div>';
        }

        return NULL;
    }
    public static function getServerUrl($path)
    {
        $protocol = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) ? 'https://' : 'http://';
        $isProd = strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN';
        if ($isProd)
        {
            $protocol = "https://";
        }
        $server = $_SERVER['SERVER_NAME'];
        if ($isProd)
        {
            $port = '';
        }
        else
        {
            $port = $_SERVER['SERVER_PORT'] ? ':'.$_SERVER['SERVER_PORT'] : '';
        }
        return $protocol.$server.$port . $path;
    }

    public static function setScrollableTable($identifier, $classes, $columns ,$values_columns, $data_object): string
    {
        return '<div class="scroll-table '.$classes.'" id="'.$identifier.'">
        <table>
            <thead>
            <tr>' . self::setScrollableTable_getThead($columns) . '</tr>
            </thead>
        </table><div class="scroll-table-body">
            <table class="table-borderless"">
                <tbody>' . self::setScrollableTable_getTbody($data_object,$values_columns) . '</tbody>
            </table>
        </div>
    </div>';
    }

    public static function setScrollableTable_getThead($columns): string
    {
        $result = '';
        foreach ($columns as $column){
            $result .= '<th>'.$column.'</th>';
        }
        return $result;
    }

    public static function setScrollableTable_getTbody($data_object,$values_columns): string
    {
        $result = '';
        foreach ($data_object as $c => $data){
            $result .= '<tr id="table_sting_'.$c.'">';
            foreach ($values_columns as $values_column){
                $result .= '<td class="table_column_'.$values_column.'">'.$data->$values_column.'</td>';
            }
            $result .= '</tr>';
        }
        return $result;
    }

    public static function convertDateFormat(string $datetime, string $format = 'd-m-Y H:s'): string
    {
        return date_format(date_create($datetime),$format);
    }

    public static function setPersonalDataBlock($classes,$identifier,$attr,$data)
    {
        return '<div class="'.$classes.'" id="'.$identifier.'" '.$attr.'>'.$data.'</div>';
    }

    public static function setPersonalPhoto()
    {
        return '<div class="personal_photo">
        <div class="col-sm-4 col-md-4">
            <div>
                <img class="photo3x4preview" alt="Фото на документы" src="/content/images/photo3x4preview.jpg" />
            </div>
            '.self::getSpanBtn('btn btn-outline-info btn-lg','photo3x4add-btn','data-toggle="modal" data-target="#modal_photo3x4"',self::getFaIcon('fas fa-camera-retro').'Загрузить фотографию'.self::getSpan('','','','style="vertical-align: text-top; color: #ff0000"','*')).'
        </div>'.
            self::createModalWindow(
            'fade',
            'modal_photo3x4',
            'tabindex="-1" role="dialog" data-backdrop="true" aria-hidden="true"',
            '',
            '',
            '<input type="file" id="load_photo3x4" accept="image/jpeg"><br><div id="photo-block"></div>',
            '',
                self::getSpanBtn('btn btn-secondary', 'cancelPhoto','data-dismiss="modal"','Отменить').self::getSpanBtn('btn btn-primary', 'savePhoto','data-dismiss="modal"','Сохранить'),
            '',
            'dialog',
            'modal-dialog-centered').'
    </div>';
    }

    public static function createModalWindow($classes,$identifier,$attr,$header_content,$header_attr,$body_content,$body_attr,$footer_content,$footer_attr,$role,$dialog_classes ): string
    {
        return '<div class="modal '.$classes.'" id="'.$identifier.'" '.$attr.'>
                    <div class="modal-dialog '.$dialog_classes.'">
                        <div class="modal-content">
                            <div class="modal-header" '.$header_attr.'>'.$header_content.'</div>
                            <div class="modal-body" '.$body_attr.'>'.$body_content.'</div>
                            <div class="modal-footer" '.$footer_attr.'>'.$footer_content.'</div>
                        </div>
                    </div>
                </div>';
    }
    public static function getSpan($type,$classes,$identifier,$attr,$text): string
    {
        return '<span type="'.$type.'" id="'.$identifier.'" class="'.$classes.'" '.$attr.'>'.$text.'</span>';
    }
    public static function getSpanBtn($classes, $identifier, $attr, $text): string
    {
        return '<span type="button" id="'.$identifier.'" class="'.$classes.'" '.$attr.'>'.$text.'</span>';
    }

    public static function getFaIcon($class_icon): string
    {
        return '<i class="'.$class_icon.'"></i>';
    }

    public static function flex_input($input_block_id,$input_id,$help_text,$input_value,$label_text,$input_name = null): string
    {
        if ($input_name == null){
            $input_name = $input_id;
        }
        return '<div class="flex_row">
                    <div class="form-group row" id="'.$input_block_id.'">
                        <div class="">
                            <label class="font-weight-bold lbl_bs" for="'.$input_id.'">
                                '.$label_text.'
                            </label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" aria-describedby="'.$input_id.'HelpBlock" id="'.$input_id.'" name="'.$input_name.'" value="'.$input_value.'">
                            <div class="valid-feedback" id="'.$input_id.'_valid">Корректно.</div>
                            <div class="invalid-feedback" id="'.$input_id.'_invalid">Поле заполненно не коректно</div>
                            <p id="'.$input_id.'HelpBlock" class="form-text text-muted">
                                '.$help_text.'
                            </p>
                        </div>
                    </div>
                </div>';
    }

    public static function flex_option($flex_id,$select_id,$select_label_text,string $options_list,$select_name=null): string
    {
        if ($select_name == null){
            $select_name = $select_id;
        }
        return '<div class="form-group row flex_row" id="'.$flex_id.'">
                    <div>
                        <label class="font-weight-bold lbl_bs" for="'.$select_id.'">
                            '.$select_label_text.'
                        </label>
                    </div>
                    <div class="col">
                        <select class="form-control" id="'.$select_id.'" name="'.$select_name.'">
                            <option value=""></option>
                            '.$options_list.'
                        </select>
                        <div class="valid-feedback" id="'.$select_id.'_valid">Корректно.</div>
                        <div class="invalid-feedback" id="'.$select_id.'_invalid">Поле заполненно не коректно</div>
                    </div>
                </div>';
    }

    public static function flex_check($flex_classes,$flex_identifier,$label_text,$checked,$input_id,$input_name=null)
    {
        if ($input_name == null){
            $input_name = $input_id;
        }
        return '<div class="form-check '.$flex_classes.'" id="aa-'.$flex_identifier.'">
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="'.$input_id.'" name="'.$input_name.'" '.$checked.' >
                        <label class="font-weight-bold" for="'.$flex_identifier.'">'.$label_text.'</label>
                    </div>
                </div>';
    }

    public static function get_personal_data_block($classes, $identifier, $text_name, $data)
    {
        return '<div class="data_container data_container-'.$identifier.'"><h5 class="res_section">'.$text_name.'</h5><br><div class="'.$classes.'" id="'.$identifier.'">'.$data.'</div><br></div>';
    }

    public static function get_label($classes,$identifier,$for,$content): string
    {
        return '<label class="'.$classes.'" id="'.$identifier.'-label" for="'.$for.'">'.$content.'</label>';
    }
    public static function get_button($type_tag,$classes,$identifier,$data,$attr,$name=null)
    {
        if ($name == null){
            $name = $identifier;
        }
        return '<'.$type_tag.' type="button" class="'.$classes.'" id="'.$identifier.'" name="'.$name.'" '.$attr.'>'.$data.'</'.$type_tag.'>';
    }
    public static function baseUrl($url = ''): string
    {
        return $url;
    }
    public static function setFormHeaderSub($header)
    {
        return '<br><h5 class="res_section">' . $header . '</h5><br>';
    }
}
