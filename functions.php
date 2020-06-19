<?php
/* Notas:
    __() Significa que se puede traducir. 1º parametro, el texto, 2º parametro, el text domain (se ve en style.css)
    add_action() Hook (hay como 4000), se usa para que aparezca en la zona de administración nuestra funcion. init es que se ejecuta al iniciar la app
*/

/** Consultas Reutilizables **/
require get_template_directory() . '/includes/queries.php';

//ShortCodes
require get_template_directory() . '/includes/shortcodes.php';

// Cuando el tema está activado
function gymfitness_setup(){

    //Habilitar imagenes destacadas
    add_theme_support('post-thumbnails');

    //Títulos SEO (IMPORTANTE, SÓLO PONER ESTA LINEA Y YA)
    add_theme_support('title-tag');

    //Agregar imagenes de tamaño personalizado
    add_image_size( 'square', 350, 350, true );
    add_image_size( 'portrait', 350, 724, true );
    add_image_size( 'cajas', 400, 375, true );
    add_image_size( 'mediano', 700, 400, true );
    add_image_size( 'blog', 966, 644, true );

}
add_action('after_setup_theme', 'gymfitness_setup');

//Menús de navegación, para agregar más, usar el array.
function gymfitness_menus(){

    register_nav_menus(array(
        'menu-principal' => __( 'Menú Principal', 'gymfitness' )

    ));

}

add_action('init', 'gymfitness_menus');

//Scripts y Styles
function gymfitness_scripts_and_styles(){
    //Cargamos normalize.css
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');

    //Cargamos fuentes de google
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap', array(), '1.0.0');

    //Cargamos estilo de lightbox
    if(is_page('galeria')):
        wp_enqueue_style( 'lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.0');
    endif;

    //Cargamos leaflet (mapa)
    if(is_page('contacto')):
        wp_enqueue_style( 'LeafletCSS', 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.css', array(), '1.6.0');
    endif;

    //Cargamos bxSlider (Slider)
    if(is_page('inicio')):
        wp_enqueue_style( 'bxSliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
    endif;

    //la hoja de estilos principal
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'google_fonts', 'slickNavCSS'), '1.0.0');

    //Agregamos SlickNav (plugin de jQuery)
    wp_enqueue_style('slickNavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0');
    wp_enqueue_script('slickNavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slickNavJS'), '1.0.0', true);
    //Cargamos js de lightbox
    if(is_page('galeria')):
        wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.0', true);
    endif;
    //Cargamos js de Leaflet (mapa)
    if(is_page('contacto')):
        wp_enqueue_script('LeafletJS', 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.js', array(), '1.6.0', true);
    endif;
      //Cargamos js de bxSlider (Slider)
    if(is_page('inicio')):
        wp_enqueue_script('bxSliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
    endif;

}

//wp_enqueue_scripts se desarrolla dentro de la funcion wp_head que llamamos desde el header.
add_action('wp_enqueue_scripts', 'gymfitness_scripts_and_styles');





//ZONA DE WIDGETS
function gymfitness_Widgets(){
    //creamos el soporte de widget, para que aparezca en el panel de administracion (apariencia/widgets)
    register_sidebar( array(
        'name' => 'Sidebar 1', //Nombre del widget, para el usuario
        'id' => 'sidebar_1', //Id para que lo reconozca WP
        'before_widget' => '<div class="widget">', //Qué va antes del widget
        'after_widget' => '</div>', //Qué va después del widget
        'before_title' => '<h3 class="text-center texto-primario">', //Qué va antes del titulo del widget
        'after_title' => '</h3>' //Qué va después del title
    ));
    register_sidebar( array(
        'name' => 'Sidebar CLases', //Nombre del widget, para el usuario
        'id' => 'sidebar_2', //Id para que lo reconozca WP
        'before_widget' => '<div class="widget">', //Qué va antes del widget
        'after_widget' => '</div>', //Qué va después del widget
        'before_title' => '<h3 class="text-center texto-primario">', //Qué va antes del titulo del widget
        'after_title' => '</h3>' //Qué va después del title
    ));

}
add_action('widgets_init', 'gymfitness_Widgets');


/** IMAGEN HERO */
function gymfitness_hero_image(){

    //obtener el ID de la pagina principal
    $front_page_id = get_option('page_on_front');
    //Obtener ID de la imagen
    $image_id = get_field('imagen_hero', $front_page_id);
    //obtener imagen
    $imagen = wp_get_attachment_image_src($image_id, 'full')[0];

    //Style CSS (false porque no vamos a inyectar un archivo, solo se va a inyectar el codigo CSS en wordpress)
    wp_register_style('custom',false);
    wp_enqueue_style('custom');

    $imagen_destacada_CSS = "
        body.home .site-header{
            background-image: linear-gradient( rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url($imagen);
        }
    ";

    wp_add_inline_style('custom', $imagen_destacada_CSS);

}
add_action('init', 'gymfitness_hero_image');
?>