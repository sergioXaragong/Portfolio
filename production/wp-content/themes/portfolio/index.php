<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>

    <title><?php bloginfo('name') ?> <?php wp_title(); ?></title>

    <link href="<?php bloginfo('stylesheet_directory') ?>/vendor/normalize-css/normalize.css" rel="stylesheet"/>
    <link href="<?php bloginfo('stylesheet_directory') ?>/vendor/flexboxgrid/dist/flexboxgrid.min.css" rel="stylesheet"/>
    <link href="<?php bloginfo('stylesheet_directory') ?>/vendor/fancybox/dist/jquery.fancybox.min.css" rel="stylesheet"/>
    <link href="<?php bloginfo('stylesheet_directory') ?>/vendor/PACE/themes/silver/pace-theme-minimal.css" rel="stylesheet"/>
    <link href="<?php bloginfo('stylesheet_directory') ?>/css/main.css" rel="stylesheet"/>

    <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory') ?>/images/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="<?php bloginfo('stylesheet_directory') ?>/images/favicon.ico" type="image/x-icon"/>

    <script src="https://use.fontawesome.com/e8ce55b9a2.js"></script>
    <script src="<?php bloginfo('stylesheet_directory') ?>/vendor/jquery/dist/jquery.min.js"></script>
</head>
<body>
<nav id="principal-menu">
    <div class="limiter-content">
        <div class="row not-margin middle-xs between-xs"><a class="title" href="<?php bloginfo('url'); ?>">Sergio</a>
            <ul class="menu row not-margin middle-xs">
                <li><a href="#home">Inicio</a></li>
                <li><a href="#about-me">Sobre Mí</a></li>
                <li><a href="#services">Servicios</a></li>
                <li><a href="#portfolio">Portafolio</a></li>
                <li><a href="#contact">Contacto</a></li>
            </ul>
            <button id="btn-menu" data-menu="#principal-menu .menu"><span></span><span></span><span></span></button>
        </div>
    </div>
</nav>
<header id="home">
    <div id="header__index">
        <div class="particles_js"></div>
        <div class="header__overlay">
            <div class="limiter-content">
                <div class="caption">
                    <h1>SERGIO ALFONSO</h1>
                    <div class="typed__layer"><span>SOY UN</span>
                        <h2 class="typed" data-typed__strings="INGENIERO DE SOFTWARE,PROGRAMADOR WEB,DESARROLLADOR MOVIL,CREADOR DE SOFTWARE"></h2>
                    </div>
                </div>
                <div class="button-scroll"></div>
            </div>
        </div>
    </div>
</header>
<section class="content">
    <section class="section" id="about-me">
        <div class="limiter-content">
            <?php
                $pageAbout = get_page_by_path( 'about' );
                $contentAbout = $pageAbout->post_content;
                $contentAbout = apply_filters('the_content', $contentAbout);

                if($pageAbout != null){ ?>
                    <article class="article row not-margin top-xs between-xs">
                        <figure class="about__image"><img src="<?php echo get_the_post_thumbnail_url($pageAbout, 'full'); ?>" alt="Sergio Alfonso"/></figure>
                        <div class="about__info">
                            <header class="title__section">
                                <h1 class="title">SOBRE MÍ</h1>
                                <h3 class="short__description">MI HISTORIA</h3>
                            </header>
                            <div class="info">
                                <?php echo $contentAbout; ?>
                            </div>
                            <div class="socials row not-margin middle-xs center-xs">
                                <?php get_template_part('template-parts/social-links') ?>
                            </div>
                        </div>
                    </article>
                <?php }
            ?>

            <div class="section__areas row top-xs">
                <div class="col-md-7 col-xs-12">
                    <div class="row top-xs">
                        <div class="col-sm-6 col-xs-12">
                            <aside class="section__area">
                                <header class="title__area">
                                    <div class="icon et icon-pencil"></div>
                                    <h3 class="title">Educación</h3>
                                </header>
                                <div class="area__info">
                                    <div class="item">
                                        <p><strong>Universidad Pedagógica y Tecnológica de Colombia</strong></p>
                                        <p>Ingeniero de Sistemas y Computación</p>
                                    </div>
                                    <div class="item">
                                        <p><strong>Platzi</strong></p>
                                        <p>Curso Online Frontend</p>
                                    </div>
                                    <div class="item">
                                        <p><strong>Servicio Nacional de Aprendizaje SENA</strong></p>
                                        <p>Tecnólogo Analisis y Diseño de Sistemas de Información</p>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <aside class="section__area">
                                <header class="title__area">
                                    <div class="icon et icon-briefcase"></div>
                                    <h3 class="title">Experiencia</h3>
                                </header>
                                <div class="area__info">
                                    <div class="item">
                                        <p><strong>Full Stack Developer</strong></p>
                                        <p>Dod Media Group</p>
                                    </div>
                                    <div class="item">
                                        <p><strong>Backend Developer</strong></p>
                                        <p>&Source Ltda</p>
                                    </div>
                                    <div class="item">
                                        <p><strong>Software Developer</strong></p>
                                        <p>Grupo Empresarial Mineralex</p>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-xs-12">
                    <aside class="section__area">
                        <header class="title__area">
                            <div class="icon et icon-tools"></div>
                            <h3 class="title">Mis Habilidades</h3>
                        </header>
                        <div class="area__info">
                            <div class="item">
                                <p><strong>Backend Technologies: PHP (Yii, Laravel, Wordpress), Python (Django), Java, MySql, Oracle</strong></p>
                                <div class="skill_progress" data-progress="90"></div>
                            </div>
                            <div class="item">
                                <p><strong>Frontend Technologies: JavaScript (Angular.js, Jquery), Html5, Css3 (Less)</strong></p>
                                <div class="skill_progress" data-progress="95"></div>
                            </div>
                            <div class="item">
                                <p><strong>Mobile Developer: Android, Cordova</strong></p>
                                <div class="skill_progress" data-progress="75"></div>
                            </div>
                            <div class="item">
                                <p><strong>Software Design: Photoshop, Illustrator</strong></p>
                                <div class="skill_progress" data-progress="65"></div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-padding not-margin" id="services">
        <div class="limiter-content">
            <header class="title__section title__white">
                <h1 class="title">MIS SERVICIOS</h1>
                <h3 class="short__description">LO QUE HAGO</h3>
            </header>
            <div class="section__areas">
                <div class="row top-xs center-xs">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <aside class="section__area">
                            <header class="title__area">
                                <div class="icon et icon-tools"></div>
                                <h3 class="title">Web Design</h3>
                            </header>
                            <div class="area__info">
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteu sunt in culpa qui officia.</p>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <aside class="section__area">
                            <header class="title__area">
                                <div class="icon et icon-mobile"></div>
                                <h3 class="title">Responsive Design</h3>
                            </header>
                            <div class="area__info">
                                <p>Digital Team is free responsive Bootstrap v3.3.5 layout from Images are from Pixabay free photo website.</p>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <aside class="section__area">
                            <header class="title__area">
                                <div class="icon et icon-basket"></div>
                                <h3 class="title">Ecommerce</h3>
                            </header>
                            <div class="area__info">
                                <p>You can edit and use this template for your websites. Please tell your friends about Tooplate. Thank you for visiting our website.</p>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <aside class="section__area">
                            <header class="title__area">
                                <div class="icon et icon-phone"></div>
                                <h3 class="title">Mobile App</h3>
                            </header>
                            <div class="area__info">
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteu sunt in culpa qui officia.</p>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <aside class="section__area">
                            <header class="title__area">
                                <div class="icon et icon-puzzle"></div>
                                <h3 class="title">Software Development</h3>
                            </header>
                            <div class="area__info">
                                <p>You can easily change icons by looking at. Excepteu sunt in culpa qui officia. Duis aute irure dolor in reprehenderit.</p>
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <aside class="section__area">
                            <header class="title__area">
                                <div class="icon et icon-strategy"></div>
                                <h3 class="title">Unlimited Support</h3>
                            </header>
                            <div class="area__info">
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteu sunt in culpa qui officia.</p>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $query = new WP_Query(array(
        'category_name'=>'portfolio',
        'order'=>'DESC',
        'orderby'=>'date'
    ));
    if($query->have_posts()){ ?>
        <section class="section" id="portfolio">
            <div class="limiter-content">
                <header class="title__section">
                    <h1 class="title">PORTAFOLIO</h1>
                    <h3 class="short__description">ALGUNOS DE MIS TRABAJOS</h3>
                </header>
                <div class="section__areas">
                    <div class="isotope">
                        <div class="isotope-filter">
                            <div class="row not-margin center-xs">
                                <button class="filter active" category="*">Todo</button>
                                <?php
                                $categories = get_categories(array('parent'=>2));
                                foreach($categories as $category){ ?>
                                    <button class="filter" category=".<?php echo $category->slug; ?>"><?php echo $category->name; ?></button>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="isotope-grid">
                            <?php while($query->have_posts()){
                                $query->the_post();
                                $categories = get_the_category();
                                $filterClass = '';
                                foreach ($categories as $key=>$category){
                                    $filterClass .= ' '.$category->slug;
                                }
                            ?>
                                <div class="grid-item <?php echo $filterClass; ?>">
                                    <div
                                        class="portfolio__item js-resizing"
                                        style="background-image:url(<?php the_post_thumbnail_url('medium') ?>);"
                                        data-resizing="1">
                                        <a
                                            class="link fancybox-custom"
                                            href="<?php the_post_thumbnail_url('full'); ?>"
                                            data-fancybox="portfolio"
                                            data-caption='<?php echo get_the_content(); ?>'>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>


    <section class="section section-padding not-margin" id="contact">
        <div class="limiter-content">
            <header class="title__section title__white">
                <h1 class="title">CONTACTO</h1>
                <h3 class="short__description">CONTÁCTATE CONMÍGO</h3>
            </header>
            <div class="section__areas">
                <div class="row top-xs">
                    <div class="col-sm-6 col-xs-12">
                        <div class="contact__info">
                            <?php if(is_active_sidebar('footer__widget__contact')){ ?>
                                <aside class="contact__block">
                                    <header class="title__area">
                                        <h3 class="title">Información Contacto</h3>
                                    </header>
                                    <address>
                                        <?php dynamic_sidebar('footer__widget__contact'); ?>
                                    </address>
                                </aside>
                            <?php } ?>
                            <aside class="contact__block">
                                <header class="title__area">
                                    <h3 class="title">Contáctame</h3>
                                </header>
                                <div class="socials row not-margin middle-xs">
                                    <?php get_template_part('template-parts/social-links') ?>
                                </div>
                            </aside>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <form class="form" id="contact-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST">
                            <input type="hidden" name="action" value="sendMessage">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form__group">
                                        <input class="form__input" name="name" placeholder="Nombre" required="required" autocomplete="off"/>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form__group">
                                        <input class="form__input" name="email" type="email" placeholder="Correo Electrónico" required="required" autocomplete="off"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form__group">
                                <textarea class="form__input" name="message" placeholder="Mensaje" required="required"></textarea>
                            </div>
                            <div class="form__group row not-margin end-sm center-xs">
                                <button class="btn" type="submit">ENVIAR MENSAJE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<footer class="footer">
    <div class="limiter-content">
        <p>© <?php echo current_time('Y'); ?> copyright<strong> Sergio</strong>. All Rights Reserved</p>
    </div>
</footer>
<script src="<?php bloginfo('stylesheet_directory') ?>/vendor/single-page-nav/jquery.singlePageNav.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory') ?>/vendor/particles.js/particles.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory') ?>/vendor/typed.js/lib/typed.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory') ?>/vendor/isotope/dist/isotope.pkgd.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory') ?>/vendor/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory') ?>/vendor/PACE/pace.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory') ?>/js/main.js"></script>
</body>
</html>