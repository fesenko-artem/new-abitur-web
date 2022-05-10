$('.show-password').on('click',function () {
    let target = $(this).parents()[0].children[1]
    if (target.type === 'password'){
        target.type = 'text'
    } else {
        target.type = 'password'
    }
})
$('#signup').on('click',function () {
    signup.check($(this).parents()[0].getElementsByTagName('input'))
})
let signup = {
    send: function (params) {
        ajax.POST(params,'/auth/register',false,signup.register_result,signup.register_error,ldr.loader_add)
    },
    register_result:function(result){
        $.each($('input'),function (key,value) {
            value.className = 'form-control'
        })
        if (result.status === false){
            $.each(result.data, function (key,value) {
                let el = $('#'+key)
                el.parent()[0].getElementsByClassName('invalid-feedback')[0].innerText = value
                el[0].className = 'form-control is-invalid'
            })
        } else {
            URI.assign('/auth/')
        }
        ldr.loader_delete()
    },
    register_error:function(){},
    check: function (params) {
        signup.send(params)
        //let status = true
        //$.each(params,function (key,value) {
        //    if (!signup['check_'+value.id](value.value)){
        //        status = false
        //    }
        //})
        //if (status){
        //    signup.send(params)
        //}
    },
    check_email:function (value) {
        if(value.match(/^[A-Za-z0-9\-\.\_]+@+[A-Za-z0-9]+.+$/)){
            $('#email')[0].className = 'form-control is-valid'
            return true;
        } else {
            $('#email')[0].className = 'form-control is-invalid'
            return false
        }
    },
    check_login:function (value) {
        let status = true
        if (value.length < 5){
            status = false
        }
        if (!value.match(/^[A-Za-z0-9\-\_\.]+$/)){
            status = false
        }
        if(status){
            $('#login')[0].className = 'form-control is-valid'
            return true
        }else {
            $('#login')[0].className = 'form-control is-invalid'
            return false
        }
    },
    check_password:function (value) {
        let status = true
        if (value.length < 5){
            status = false
        }
        if (!value.match(/[\!\@\#\$\%\^\&\*\(\)\+\=?\-\_\.]+/)){
            status = false
        }
        if (!value.match(/[0-9]+/)){
            status = false
        }
        if (!value.match(/[A-Z]+/)){
            status = false
        }
        if (!value.match(/[a-z]+/)){
            status = false
        }
        if(status){
            $('#password')[0].className = 'form-control is-valid'
            return true
        }else {
            $('#password')[0].className = 'form-control is-invalid'
            return false
        }
    },
    check_re_password:function (value) {
        let status = true
        if (value !== $('#password').val()){
            status = false
        }
        if (value.length < 5){
            status = false
        }
        if (!value.match(/[\!\@\#\$\%\^\&\*\(\)\+\=?\-\_\.]+/)){
            status = false
        }
        if (!value.match(/[0-9]+/)){
            status = false
        }
        if (!value.match(/[A-Z]+/)){
            status = false
        }
        if (!value.match(/[a-z]+/)){
            status = false
        }
        if(status){
            $('#re_password')[0].className = 'form-control is-valid'
            return true
        }else {
            $('#re_password')[0].className = 'form-control is-invalid'
            return false
        }
    }
}
$(document).ready(function () {
    if ($(document).width()<900){
        $('span[class="input-group-text"]').hide()
        $('main')[0].className = 'container w-100'
    }
    $(window).resize(function () {
        if ($(document).width()<900){
            $('span[class="input-group-text"]').hide()
            $('main')[0].className = 'container w-100'
        } else {
            $('span[class="input-group-text"]').show()
            $('main')[0].className = 'container w-25'
        }
        //console.log($(document).width())
    })
})