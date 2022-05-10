<?= $theme->make_base_tag(
        'main',['class'=>'container w-50'],
    $theme->make_base_tag('form',[],
        $theme->make_base_tag('h1',['class'=>'h3 mb-3 fw-normal text-center'],'Регистрация',$theme::DIV_CLOSE_BASE_TAG).
        $theme->input_group(
            'input-group-sm mb-3',
            $theme->make_base_tag(
                'span',
                ["class"=>"input-group-text", "id"=>"email-span"],
                'Адрес эл. почты',
                $theme::DIV_CLOSE_BASE_TAG
            ).
            $theme->make_base_tag(
                'input',
                ["class"=>"form-control","aria-label"=>"Адрес эл. почты",'type'=>'email','id'=>'email', 'placeholder'=>'Введите email','autocomplete'=>"off"],
                '',
                $theme::INPUT_BASE_TAG
            ). '<div class="valid-feedback">Все хорошо!</div><div class="invalid-feedback">Поле адрес эл. почты заполнено неверно.</div>'
        ).
        $theme->input_group(
            'input-group-sm mb-3',
            $theme->make_base_tag(
                'span',
                ["class"=>"input-group-text", "id"=>"login-span"],
                'Логин',
                $theme::DIV_CLOSE_BASE_TAG
            ).
            $theme->make_base_tag(
                'input',
                ["class"=>"form-control","aria-label"=>"Логин",'type'=>'text','id'=>'login','placeholder'=>'Введите логин','autocomplete'=>"off"],
                '',
                $theme::INPUT_BASE_TAG
            ). '<div class="valid-feedback">Все хорошо!</div><div class="invalid-feedback">Поле логин заполнено неверно.</div>'
        ).
        $theme->input_group(
            'input-group-sm mb-3',
            $theme->make_base_tag(
                'span',
                ["class"=>"input-group-text", "id"=>"password-span"],
                'Пароль',
                $theme::DIV_CLOSE_BASE_TAG
            ).
            $theme->make_base_tag(
                'input',
                ["class"=>"form-control","aria-label"=>"Пароль",'type'=>'password','id'=>'password', 'placeholder'=>'Введите пароль','autocomplete'=>"off"],
                '',
                $theme::INPUT_BASE_TAG
            ).
            $theme->make_base_tag(
                'span',
                ["class"=>"btn btn-secondary input-group-text show-password",'type'=>'button'],
                '<i class="fa-solid fa-key"></i>',
                $theme::DIV_CLOSE_BASE_TAG
            ). '<div class="valid-feedback">Все хорошо!</div><div class="invalid-feedback">Поле пароль заполнено неверно.</div>'
        ).
        $theme->input_group(
            'input-group-sm mb-3',
            $theme->make_base_tag(
                'span',
                ["class"=>"input-group-text", "id"=>"re_password-span"],
                'Повторите пароль',
                $theme::DIV_CLOSE_BASE_TAG
            ).
            $theme->make_base_tag(
                'input',
                ["class"=>"form-control","aria-label"=>"Повторите пароль",'type'=>'password','id'=>'re_password','placeholder'=>'Повторите пароль','autocomplete'=>"off"],
                '',
                $theme::INPUT_BASE_TAG
            ).
            $theme->make_base_tag(
                'span',
                ["class"=>"btn btn-secondary input-group-text show-password",'type'=>'button'],
                '<i class="fa-solid fa-key"></i>',
                $theme::DIV_CLOSE_BASE_TAG
            ). '<div class="valid-feedback">Все хорошо!</div><div class="invalid-feedback">Поле подтверждение пароля заполнено неверно.</div>'
        ).
        $theme->make_base_tag('button',['class'=>'w-100 btn btn-lg btn-primary','id'=>'signup','type'=>'button'],'Зарегистрироваться',$theme::DIV_CLOSE_BASE_TAG).
        $theme->make_base_tag('p',['class'=>'mt-5 mb-3 text-center text-muted'],'© 2022',$theme::DIV_CLOSE_BASE_TAG),
        $theme::DIV_CLOSE_BASE_TAG
    ),$theme::DIV_CLOSE_BASE_TAG)
?>