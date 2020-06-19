<?php get_header(); ?>

    <?php 

    //Comprobamos que sea el formulario de contacto para quitar el sidebar
        $clase = "con-sidebar";
        if(get_the_title() == "Contacto"):
            $clase = "no-sidebar";
        endif;
    ?>
    <main class="contenedor pagina seccion <?php echo $clase; ?>">
        <div class="contenido-principal">
            <?php get_template_part('template-parts/loop-paginas'); ?>
        </div>
        <?php 

        //Si es el formulario de contacto, quitamos el sidebar
            if(get_the_title() != "Contacto"):
                get_sidebar(); 
            endif;
        ?>
    </main>

<?php get_footer(); ?>