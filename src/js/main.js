$.when($.ready).then(function() {
    init();
});

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
        //offset: $('.single-page-nav').outerHeight(),
        filter: ':not(.external)',
        currentClass: 'active',
        updateHash: true
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

var init = function(){
    particles();
    typed();

    singlePageNav();
    scrollEvent();
};