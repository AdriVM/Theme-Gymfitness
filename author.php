<?php get_header(); ?>
    <main class="pagina seccion contenedor">
        <?php 
            //get_queried_object() devuelve un objeto, por lo que se debe acceder como un objeto con ->
            $autor = get_queried_object();
        ?>
        <h2 class="text-center texto-primario"> 
            Autor:
            <?php 
                /*echo "<pre>";
                echo var_dump($autor);
                echo "</pre>";*/
                echo $autor->data->display_name;
            ?>
        </h2>
        <p class="text-center"><?php echo get_the_author_meta('description', $autor->data->ID); ?></p>
        <ul class="listado-blog">
        <?php get_template_part('template-parts/loop-blog'); ?>
        </ul>
    </main>
<?php get_footer(); ?>