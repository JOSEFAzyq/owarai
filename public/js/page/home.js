/**
 * Created by @josefa on 2017/3/12 0012.
 */
$(function(){

    //遮蔽罩
    $('.navigation-show').hover(function(){
        $('.canvas').addClass('show');
    },function(){
        $('.canvas').removeClass('show');
    })

    $(window).scroll(function(){
        var h=$(window).scrollTop();
        if(h>450){
            $('.return').addClass('showMove');
        }else if(h<=450){
            $('.return').removeClass('showMove');
        }

    })

    $('.return').on('click',function(){
        $("body").velocity("scroll", { duration: 500, easing: "easeOutQuart" });
    })



})