$('#auth').on('click',function () {
    ajax.POST($('input'),'/auth/auth',false,auth.authorize,auth.authorize,ldr.loader_add)
})
let auth = {
    authorize:function (params) {
        if (params.status === true){
            URI.assign(params.data)
        }else {
            console.log(params)
        }
        ldr.loader_delete()
    }
}