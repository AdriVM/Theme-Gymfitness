<?php get_header(); ?>

    <main class="contenedor pagina seccion con-sidebar">
        <div class="contenido-principal">
            <?php get_template_part('template-parts/loop-paginas'); ?>
        </div>
        <?php 
            //Le pasamos clases para que reconozca el sidebar de sidebar-clases.php en vez del de por defecto
            get_sidebar('clases'); 
        ?>
    </main>

<?php get_footer(); ?>