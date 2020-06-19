<?php
/*
    Este template está predeterminado por el slug 'nuestras-clases' perteneciente al nombre del archivo.
    Este slug se debe sacar de la parte de administración dentro de la página en cuestión ## Opciones de pantalla ##
    allí se desplegará la parte superior y marcamos la casilla ## Slug ##.

    Una vez marcado, en la parte inferior de la página, se nos muestra el slug. Debemos copiarlo y
    al crear el archivo php, debemos poner ## page-(nuestro slug).php ##
*/
?>
<?php get_header(); ?>

<main class="contenedor pagina seccion no-sidebar">
    <div class="text-center">
        <?php get_template_part('template-parts/loop-paginas'); ?>


        <?php gymfitness_listado_clases(); ?>
    </div>
</main>

<?php get_footer(); ?>