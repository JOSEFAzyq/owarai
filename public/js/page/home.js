/**
 * Created by @josefa on 2017/3/12 0012.
 */
$(function(){
    $('.navigation-show').hover(function(){
        $('.navigation').css('display','block').velocity({
            opacity:'1'
        },{
            duration:200,
            delay:50
        })
    },function(){
        $('.navigation').velocity({
            opacity:'0'
        },{
            duration:200,
            delay:50
        })
        setTimeout(function(){
            $('.navigation').css('display','none')
        },400);
    })




})