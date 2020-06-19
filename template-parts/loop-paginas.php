<?php while( have_posts() ): the_post(); ?>

<h1 class="text-center texto-primario"><?php the_title(); ?></h1>

<?php 
    if(has_post_thumbnail($post)):
        the_post_thumbnail('blog', array('class' => 'imagen-destacada')); 
    else:
        if(get_the_title() != "Contacto"):
        echo "no hay nada.";
        endif;
    endif;
?>

<?php 

    //Si el post-type es el de nuestro plugin, mostramos el horario de la clase.
    if(get_post_type() === 'gymfitness_clases'){

        //Funciones del plugin de advanced custom fields, no de WP, IMPORTANTE!!!!!!!!!!!
            $hora_inicio = get_field("hora_inicio");
            $hora_fin = get_field("hora_fin");
?>
        <p class="informacion-clase"><?php the_field("dias_clase");?>  -  <?php echo $hora_inicio . " a " . $hora_fin . " horas."; ?></p>
<?php } ?>

<?php the_content(); ?>

<!--Escrito por: <?php //the_author(); ?> - <?php //the_date( 'd/m/Y, H:i', '<i>', '</i>' ); ?>-->

<?php endwhile; ?>