<?php 
/*
*   Template Name: Contenido Centrado (Sin Sidebar)
*/
// poniendo template name, conseguimos hacer distintos tipos de paginas seleccionables desde el panel de administrador.

get_header(); ?>

    <main class="contenedor pagina seccion no-sidebar">
        <div class="contenido-principal">
            <?php get_template_part('template-parts/loop-paginas'); ?>
        </div>
    </main>

<?php get_footer(); ?>