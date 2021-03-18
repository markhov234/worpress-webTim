// define(["require", "exports"], function (require, exports) {
//     "use strict";
//     Object.defineProperty(exports, "__esModule", { value: true });
//     exports.Caroussel = void 0;
// var Caroussel =(function ()
// {
    document.querySelector('video').playbackRate = 0.8;
    let bg_img0 = $('#pict0.imgRealisation img').attr('src');
    let bg_img1 = $('#pict1.imgRealisation img').attr('src');
    let bg_img2 = $('#pict2.imgRealisation img').attr('src');

    console.log()

    let zoneEnveloppe = $('.accueil__realisations__enveloppe');

    window.addEventListener('load', function () {

        if (bg_img0 != null) {
            $('.accueil__creedI').css("background-image", "url(" + bg_img0 + ")");
        } else {
            $('.accueil__creedI').css("background-color,#222222");
        }

    })


    document.getElementById('img1').addEventListener('click', function () {
        zoneEnveloppe.css("justify-content", 'end')
        $('.accueil__creedI').css("background-image", "url(" + bg_img0 + ")");
        console.log('allo 1')

    })
    document.getElementById('img2').addEventListener('click', function () {
        zoneEnveloppe.css("justify-content", 'center')

        $('.accueil__creedI').css("background-image", "url(" + bg_img1 + ")");
        console.log('allo 2')


    })
    document.getElementById('img3').addEventListener('click', function () {
        zoneEnveloppe.css("justify-content", 'flex-end')

        $('.accueil__creedI').css("background-image", "url(" + bg_img2 + ")");
        console.log('allo 3')


    })


    let winScrollTop = 0;

    $.fn.is_on_screen = function () {
        let win = $(window);
        let viewport = {
            top: win.scrollTop(),
            left: win.scrollLeft()
        };
        //viewport.right = viewport.left + win.width();
        viewport.bottom = viewport.top + win.height();

        let bounds = this.offset();
        //bounds.right = bounds.left + this.outerWidth();
        bounds.bottom = bounds.top + this.outerHeight();

        return (!(viewport.bottom < bounds.top || viewport.top < bounds.bottom));
    };

    function parallax(hasard) {
        let scrolled = $(window).scrollTop();
        $('.layer1').each(function () {

            if ($(this).is_on_screen()) {
                let firstTop = $(this).offset().top;

                // let $span = $(this).find("div");
                let $figure1 = $(this).find(".figure1");
                let $figure2 = $(this).find(".figure2");
                let $figure3 = $(this).find(".figure3");
                let $figure4 = $(this).find(".figure4");

                // console.log($span.length)
                let moveTop = (firstTop - winScrollTop) * 0.3 //speed;
                $figure1.css("transform", "translateY(" + -moveTop + "px)");
                $figure2.css("transform", "translateY(" + -moveTop + "px)");
                $figure3.css("transform", "translateY(" + -moveTop + "px)");
                $figure4.css("transform", "translateY(" + -moveTop + "px)");
            }

        });
        $('.layer2').each(function () {

            if ($(this).is_on_screen()) {
                let firstTop = $(this).offset().top;

                let $figure5 = $(this).find(".figure5");
                let $figure6 = $(this).find(".figure6");
                let $figure7 = $(this).find(".figure7");
                let $figure8 = $(this).find(".figure8");

                // let $span = $(this).find("div");
                let moveTop = (firstTop - winScrollTop) * 0.7 //speed;
                $figure5.css("transform", "translateY(" + -moveTop + "px)");
                $figure6.css("transform", "translateY(" + -moveTop + "px)");
                $figure7.css("transform", "translateY(" + -moveTop + "px)");
                $figure8.css("transform", "translateY(" + -moveTop + "px)");
            }

        });
    }

    $(window).scroll(function (e) {
        winScrollTop = $(this).scrollTop();
        parallax();
    });

// })}