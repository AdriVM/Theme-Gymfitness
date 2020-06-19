<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        //Funcion que habilita el enlace de los scripts y las hojas de estilos
        wp_head(); 
    ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="contenedor header-grid">
            <div class="barra-navegacion">
                <div class="logo">
                    <a href="<?php echo esc_url(site_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="logo-sitio">
                    </a>
                </div>
                <!-- NAVEGACIÓN AQUÍ -->
                <?php
                    /*
                        menu-principal es como le hemos llamado al menu en fucntions.php
                        wp_nav_menu pinta el menú definido en $args
                    */
                        $args = array(
                            'theme_location' => 'menu-principal',
                            'container' => 'nav',
                            'container_class' => 'menu-principal'
                        );
                        wp_nav_menu($args);
                    ?>
            </div><!-- Fin Barra de navegacion -->
            <div class="tagline text-center">
                <h1><?php the_field('encabezado_hero');?></h1>
                <p><?php the_field('contenido_hero') ?></p>
            </div>
        </div>
    </header>