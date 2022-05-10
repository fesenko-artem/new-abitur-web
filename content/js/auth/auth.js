$('#auth').on('click',function () {
    ajax.POST($('input'),'/auth/auth',false,auth.authorize,auth.authorize,ldr.loader_add)
})
let auth = {
    authorize:function (params) {
        console.log(params)
        ldr.loader_delete()
    }
}