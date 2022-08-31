let Carousel = function(){
    let $loc = new Array();

    this.swiper = function($coord, $obj){
        if(document.querySelector($coord)){
            document.addEventListener("DOMContentLoaded", function(){
                const swiper = new Swiper($coord, $obj);
    
            });
        }
    }

    this.bootstrap = function( $obj, $coord = ".boot-carousel"){
        if(document.querySelector($coord)){
           document.addEventListener('DOMContentLoaded', ()=> {
                let carousel = document.querySelector($coord)
                let bootCarousel = new bootstrap.Carousel(carousel, $obj)
           })
        }
    }
}

let cmd = new Carousel();


cmd.swiper(".swiper-container", {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar',
    },
})



cmd.bootstrap({
    interval: 1000,
    wrap: false
});

export{
    Carousel
}