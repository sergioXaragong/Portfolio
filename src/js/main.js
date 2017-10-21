$.when($.ready).then(function() {
    init();

    $('#btn-menu').on('click', function(){
        var button = $(this);
        if(button.is('[data-menu]')){
            var menu = $(button.attr('data-menu'));
            menu.toggleClass('active');
        }
    });
    $(document).on('click', '#principal-menu .menu.active a', function(){
        console.log('TEST');
        var menu = $('#principal-menu .menu');
        menu.toggleClass('active');
    });


    $('#contact-form').on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        preloadObject.show();
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            dataType: 'json',
            data: form.serialize()
        })
            .done(function(data) {
                alertMessage(data.message);
                if(data.status)
                    form.find('input, textarea').val('');
            })
            .fail(function() {
                alertMessage('Error intentando conectar con el servidor. Intente mas tarde!!!');
            })
            .always(function() {
                preloadObject.hide();
            });
    });
});

var resizingElement = function(){
    $('.js-resizing:not(.js-resizing-check)').each(function() {
        var element = $(this);
        $(window).resize(function() {
            var width = element.outerWidth();
            element.css({
                "height": width * eval(element.attr('data-resizing'))
            });
            element.addClass('js-resizing-check');
        }).resize();
    });
};

/************************************************/

var particles = function(){
    $('.particles_js').each(function(){
        var content = $(this);
        var id = '';
        if(!content.is('[id]')){
            id = 'particles_'+Date.now();
            content.attr('id', id);
        }
        else
            id = content.attr('id');

        particlesJS(id,{
            particles:{
                number:{
                    value:80,
                    density:{
                        enable:true,
                        value_area:800
                    }
                },
                color:{value:"#555"},
                shape:{
                    type:"circle",
                    stroke:{
                        width:0,
                        color:"#888"
                    },
                    polygon:{nb_sides:5},
                    image:{
                        src:"img/github.svg",
                        width:100,
                        height:100
                    }
                },
                opacity:{
                    value:.5,
                    random:false,
                    anim:{
                        enable:false,
                        speed:1,
                        opacity_min:.1,
                        sync:false
                    }
                },
                size:{
                    value:5,
                    random:true,
                    anim:{
                        enable:false,
                        speed:40,
                        size_min:.1,
                        sync:false
                    }
                },
                line_linked:{
                    enable:true,
                    distance:150,
                    color:"#ccc",
                    opacity:.4,
                    width:1
                },
                move:{
                    enable:true,
                    speed:6,
                    direction:"none",
                    random:false,
                    straight:false,
                    out_mode:"out",
                    attract:{
                        enable:false,
                        rotateX:600,
                        rotateY:1200
                    }
                }
            },
            interactivity:{
                detect_on:"canvas",
                events:{
                    onhover:{
                        enable:true,
                        mode:"repulse"
                    },
                    onclick:{
                        enable:true,
                        mode:"push"
                    },
                    resize:true
                },
                modes:{
                    grab:{
                        distance:400,
                        line_linked:{opacity:1}
                    },
                    bubble:{
                        distance:400,
                        size:40,
                        duration:2,
                        opacity:8,
                        speed:3
                    },
                    repulse:{distance:200},
                    push:{particles_nb:4},
                    remove:{particles_nb:2}
                }
            },
            retina_detect:true,
            config_demo:{
                hide_card:false,
                background_color:"#b61924",
                background_image:"",
                background_position:"50% 50%",
                background_repeat:"no-repeat",
                background_size:"cover"
            }
        });
    });
};

var typed = function(){
    $('.typed').each(function(){
        var id = '';
        var strings = [];
        var typedElement = $(this);

        if(typedElement.is('[data-typed__strings]')){
            var dataTyped = typedElement.attr('data-typed__strings');
            strings = dataTyped.split(',');
        }
        if(!typedElement.is('[id]')){
            id = 'particles_'+Date.now();
            typedElement.attr('id', id);
        }
        else
            id = typedElement.attr('id');

        new Typed(('#'+id), {
            strings: strings,
            loop: true,
            startDelay: 1e3,
            backDelay: 2e3,
            typeSpeed: 75
        });
    });
};

var singlePageNav = function(){
    $('#principal-menu').singlePageNav({
        speed: 1e3,
        currentClass: "active",
        offset: 105,
        threshold: 20
    });
};

var scrollEvent= function(){
    $(window).on('scroll', function(){
        var scroll = $(window).scrollTop();
        if(scroll > 250)
            $('#principal-menu').addClass('scroll');
        else
            $('#principal-menu').removeClass('scroll');
    }).scroll();
};

var skillsProgress = function(){
    $('.skill_progress').each(function(){
        var skill = $(this);
        if(skill.is('[data-progress]')){
            var progress = parseInt(skill.attr('data-progress'));
            skill.append($('<span>').css('width', (progress+'%')));
        }
    });
};

var isotopeGrid = function(){
    $('.isotope').each(function(){
        var isotope = $(this);
        var grid = isotope.find('.isotope-grid');
        var isotopeGrid = grid.isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows'
        });

        isotope.find('.isotope-filter .filter').on('click', function(){
            isotope.find('.isotope-filter .filter').removeClass('active');
            var button = $(this);
            var filter = button.attr('category');
            isotopeGrid.isotope({filter: filter});
            button.addClass('active');
        });

        $(window).on('resize', function(){
            isotopeGrid.isotope('reloadItems');
        }).resize();
        setTimeout(function(){
            isotopeGrid.isotope();
        }, 500);
    });
};

var fancyboxCustom = function(){
    $('a.fancybox-custom').fancybox({
        idleTime  : false,
        baseClass : 'fancybox-custom-layout',
        margin    : 0,
        infobar   : false,
        thumbs    : { hideOnClose : false },
        touch : { vertical : 'auto' },
        buttons : [
            'close',
            'thumbs',
            'slideShow',
            'fullScreen'
        ],
        animationEffect   : false,
        closeClickOutside : false,

        caption : function( instance ) {
            //var advert = '<div class="ad"><p><a href="//fancyapps.com/fancybox/">fancyBox3</a> - touch enabled, responsive and fully customizable lightbox script</p></div>';
            var advert = '';
            return advert + ( $(this).data('caption') || '' );
        }
    });
};


var preloadObject = {
    show: function(){
        var preload = $('.preloader');
        if(!preload.length){
            preload = $('<div>', {class: 'preloader'})
                .append($('<div>', {class: 'wrapper'})
                    .append($('<div>', {class: 'indicator'})
                        .append($('<span>'))
                        .append($('<span>'))
                        .append($('<span>'))
                        .append($('<span>'))));
            $('body').append(preload);
        }
    },
    hide: function(){
        var preload = $('.preloader');
        preload.addClass('remove');
        setTimeout(function(){
            preload.remove();
        }, 400);
    }
};

var alertMessage = function(message){
    var message = $('<div>', {class: 'alert-message'})
            .append($('<p>', {text: message}));
    $('body').append(message);
    setTimeout(function(){
        message.remove();
    }, 5000);
};


var init = function(){
    resizingElement();

    particles();
    typed();

    singlePageNav();
    scrollEvent();

    skillsProgress();

    isotopeGrid();
    fancyboxCustom();
};