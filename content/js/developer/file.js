$(document).ready(function () {
    ajax.POST([{id:'path',value:current_path}],'/developer/api/post/list_path',false,file.get_file_list,file.get_file_list_error,ldr.loader_add)
})
$('.file-container-back').on('click',function () {
    let p = current_path.split('/')
    if (p.length > 1){
        p.remove(p.length-1)
        current_path = p.join('/')
        $('#file_path').val(current_path)
        ajax.POST([{id:'path',value:current_path}],'/developer/api/post/list_path',false,file.get_file_list,file.get_file_list_error,ldr.loader_add)
    }
})
$('.file-container-home').on('click',function () {
    current_path = home_path
    $('#file_path').val(current_path)
    ajax.POST([{id:'path',value:home_path}],'/developer/api/post/list_path',false,file.get_file_list,file.get_file_list_error,ldr.loader_add)
})
let file = {
    get_file_list: function (data) {
        if (data.status){
            $('.item-file-container').detach()
            file.render_file_list(data.data)
        }

    },
    get_file_list_error: function (data) {
        console.log(data)
    },
    render_file_list:function (file_list = []) {
        $.each(file_list,function (key,subject) {
            $.each(subject,function (k,unit) {
                $('.file-list').append(file['render_'+unit.type](unit))
            })
        })
        $('.file-container-body-folder').on('click',function () {
            //console.log($(this).attr('open-unit-link'))
            old_path = current_path
            current_path = $(this).attr('open-unit-link')
            $('#file_path').val(current_path)
            console.log($('#file_path'))
            ajax.POST([{id:'path',value:$(this).attr('open-unit-link')}],'/developer/api/post/list_path',false,file.get_file_list,file.get_file_list_error,ldr.loader_add)
            //console.log(old_path)
        })
        $('.file-container-body-folder').on('contextmenu',function () {
            alert(this)
            return false
        })
    },
    render_dir:function (dir_data) {
        return `
        <span class="file-container-body-folder d-flex flex-column item-file-container" title="${dir_data.name}" type-unit="${dir_data.type}" open-unit-link="${current_path}/${dir_data.name}" type="button">
                    <span class="file-container-body-folder-icon"><i class="fa-light fa-folder"></i></span>
                    <span class="text-break file-container-body-folder-name">${dir_data.name}</span>
                </span>
        `
    },
    render_file:function (file_data) {
        let type_icon = ''
        switch (file_data.format) {
            case 'php':
                type_icon = `<i class="fa-brands fa-php"></i>`
                break;
            case 'htaccess':
                type_icon = `<i class="fa-light fa-memo-circle-info"></i>`
                break;
            default:
                type_icon = `<i class="fa-light fa-file-code"></i>`
        }
        return `
        <span class="file-container-body-file d-flex flex-column item-file-container" title="${file_data.name}" type-unit="${file_data.type}" open-unit-link="${current_path}/${file_data.name}" type="button">
                    <span class="file-container-body-folder-icon">${type_icon}</span>
                    <span class="text-break file-container-body-folder-name">${file_data.name}</span>
                </span>
        `
    }
}