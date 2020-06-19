<?php get_header(); ?>
<main class="pagina seccion contenedor">
    <?php 
            //get_queried_object() devuelve un objeto, por lo que se debe acceder como un objeto con ->
            $categoria = get_queried_object();
        ?>
    <h2 class="text-center texto-primario">
        Categoría:
        <?php 
                /*echo "<pre>";
                echo var_dump($categoria);
                echo "</pre>"*/
                echo $categoria->name;
            ?>
    </h2>
    <ul class="listado-blog">
        <?php while(have_posts()): the_post(); ?>
        <?php get_template_part('template-parts/loop-blog'); ?>
        <?php endwhile; ?>
    </ul>
</main>
<?php get_footer(); ?>