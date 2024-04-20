$(document).ready(function(){
    $("#banner-area .owl-carousel").owlCarousel({
        dots:true,
        items:1,
        loop:true
    })

    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

    var $grid = $(".grid").isotope({
        itemSelector:'.grid-items',
        layoutMode:'fitRows'
    });

    $(".button-group").on("click","button",function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter:filterValue});
    })

    let $qty_up=$(".qty .qty-up");
    let $qty_down=$(".qty .qty-down");
    //let $input=$(".qty .qty_input");
    $qty_up.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        if($input.val()>=1 && $input.val()<=9)
        {
            $input.val(function(i,oldval){
                return ++oldval;
            })
        }
    }); 
    $qty_down.click(function(e){
        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        if($input.val()>1 && $input.val()<=10)
        {
            $input.val(function(i,oldval){
                return --oldval;
            })
        }
    }); 

});
