<?= $theme->make_base_tag(
        'main',['class'=>'form-signin'],
    $theme->make_base_tag('form',[],
        $theme->make_base_tag('h1',['class'=>'h3 mb-3 fw-normal text-center'],'Авторизация',$theme::DIV_CLOSE_BASE_TAG).
        $theme->form_floating('email','email','Адрес эл. почты','name@example.com').
        $theme->form_floating('password','password','Пароль','Пароль').
        $theme->make_base_tag('button',['class'=>'w-100 btn btn-lg btn-primary','id'=>'auth','type'=>'button'],'Войти',$theme::DIV_CLOSE_BASE_TAG).
        $theme->make_base_tag('a',['href'=>'/auth/signup'],'Регистрация',$theme::DIV_CLOSE_BASE_TAG)
        //$theme->make_base_tag('p',['class'=>'mt-5 mb-3 text-center text-muted'],'© 2022',$theme::DIV_CLOSE_BASE_TAG),
        ,$theme::DIV_CLOSE_BASE_TAG
    ),$theme::DIV_CLOSE_BASE_TAG)
?>