$(document).ready(function () {
    switch (URI.pathname.split('/')[3]) {
        case 'file':
            include.js('/file')
            break;
    }
})