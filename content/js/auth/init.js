$(document).ready(function () {
    include.css(ENV)
    if(URI.pathname.split(ENV)[1] === '/'){
        include.js(ENV)
    } else {
        include.js(URI.pathname.split(ENV)[1].split('/')[1])
    }

})