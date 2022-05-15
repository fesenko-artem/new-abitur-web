let URI = document.location
Array.prototype.remove = function(el) {
    return this.splice(this.indexOf(el), 1);
}
let get_document_params = function (uri) {
    let params = {}
    if (uri === undefined){
        return null
    }
    $.each(uri.split('&'),function (param,param_value) {
        let p = param_value.split('=')
        params[p[0]] = p[1]
    })
    return params
}
let include = {
    url: URI.protocol+'//'+URI.host+'/content/',
    js: function (pac) {
        let source = `<script src="${this.url}js/${ENV}/${pac}.js" type="text/javascript"></script>`
        $('ext-js').append(source)
    },
    css: function (pac) {
        let source = `<link rel="stylesheet" href="${this.url}css/${ENV}/${pac}.css">`
        $('ext-css').append(source)
    }
}
class loader{
    loader_add(){
        let loader_body = `
    <div class="loader">
        <div class="loader-inner">
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
        </div>
    </div>`
        $(loader_body).insertBefore($('footer'))
        return this
    }
    loader_delete() {
        $('.loader').detach()
        return this
    }
}
class AJAX{
    POST($params,uri,async= false,callback_result_function,callback_error_function,callback_before_send_function)
    {
        let param_data = new FormData
        $.each($params,function (key,value) {
            if(value.type !== 'file'){
                param_data.append(value.id,value.value)
            }
        })
        $.ajax({
            url: uri,
            async: async,
            type: 'POST',
            data: param_data,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend:function (){callback_before_send_function()},
            success: function (result) {callback_result_function(result)},
            error: function (result) {callback_error_function(result)}
        })
    }
    GET($params){}
}
let ajax = new AJAX()
let ldr = new loader()
$(document).ready(function () {
    URI.params = get_document_params(URI.href.split('?')[1])
    include.js('init')
})