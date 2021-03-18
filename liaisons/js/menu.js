// console.log('allo je fonctionnes')
let verification=false;

$('.boutonMobile').click(function ()
{
    verification=!verification;
    $(this).toggleClass('click');
    if(verification===true){

        // $('.sidebar').css('visibility',"visible")
        $('.sidebar').addClass('show');
        $('.sidebar').removeClass('cacher');
    }else {
        $('.sidebar').delay(400).queue(function (next){
            $('.sidebar').addClass('cacher');

            next();
        })
        $('.sidebar').removeClass('show');
    }
})


let menu = document.getElementById(('menu'));
let prevScrollpos = window.pageYOffset;

function isMobile() {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

console.log(isMobile())
if (!isMobile()) {
//place script you don't want to run on mobile here

    window.onscroll= function (){
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            menu.style.top="30px"
        } else {
            menu.style.top="-50px"
        }
        prevScrollpos = currentScrollPos;
    }
}
