<?php

function gymfitness_listado_clases($cantidad = -1){ ?>
    <ul class="lista-clases">
        <?php 

            $args = array(
                'post_type' => 'gymfitness_clases', //Lo sacamos de nuestro plugin, parte de register_post_type().
                'posts_per_page' => $cantidad, //-1 todos.
                'order' => 'ASC'
            );

            $clases = new WP_Query($args);
            while( $clases -> have_posts()):
                $clases -> the_post();
        ?>

            <li class="clase card gradient">
                <?php the_post_thumbnail( 'mediano'); ?>
                <div class="contenido">
                    <a href="<?php the_permalink(); ?>">
                        <h3 class="texto-blanco"><?php the_title(); ?></h3>
                        <?php 
                        //Funciones del plugin de advanced custom fields, no de WP, IMPORTANTE!!!!!!!!!!!
                            $hora_inicio = get_field("hora_inicio");
                            $hora_fin = get_field("hora_fin");
                        ?>
                        <p><?php the_field("dias_clase");?>  -  <?php echo $hora_inicio . " a " . $hora_fin . " horas."; ?></p>
                    </a>
                </div>
                
            </li>


        <?php 
            endwhile; 
            wp_reset_postdata(); //Reseteamos el WP_Query, es como cerrar la conexion.
        ?>
    </ul>



<?php
}
?>