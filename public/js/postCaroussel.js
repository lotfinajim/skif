jQuery(document).ready(function(){

    jQuery('.postCaroussel').owlCarousel({
        items:3,
        responsive:{
            0:{
                items : 1
            },
            768:{
                items:3,
                margin:.30
            },
            992:{
                items:4,
                margin : 30
            },
            1170:{
                items:5,
                margin : 30
            }
        }
    })
});