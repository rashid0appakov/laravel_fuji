require('./bootstrap');
require('flag-icon-css/css/flag-icon.css')
window.Vue = require('vue').default;
const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const app = new Vue({
    el: '#app',
});

$(document).ready(function(){
    $('.modal.visible').modal('show')
    $('.mode').click(toggleDark);
    if(localStorage.getItem('dark')) $('body').addClass('bg1 dark')
    $('.sidebar-toggle').click(function(){
        $('.sidebar').toggleClass('active')
    })
    $('.eq-group').each(function(){
        let min = 0;
        const items = $(this).find('.eq-height')
        items.each(function(){
            const h = $(this).height()
            if(h > min) min = h;
        })
        items.height(min)
    })
})
function toggleDark(){
    let dark = !localStorage.getItem('dark')
    window.localStorage.setItem('dark', dark ? '1': '')
    if(dark){
        $('body').addClass('bg1 dark')
    }else{
        $('body').removeClass('bg1 dark')
    }
}