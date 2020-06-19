<?php 
/**
 * Template Name: Template para Galerías
 * 
 */
get_header(); ?>

    <main class="contenedor pagina seccion">
        <div class="contenido-principal">
            
            
        <?php while( have_posts() ): the_post(); ?>

            <h1 class="text-center texto-primario"><?php the_title(); ?></h1>

            <?php 

                //Obtener galeria actual
                $galeria = get_post_gallery(get_the_ID(), false);
                //Obtener los IDs de las imagenes de las galerias
                $galeria_imagenes_ID = explode(',', $galeria['ids']);
                /*
                echo "<pre>";
                var_dump($galeria_imagenes_ID);
                echo "</pre>";
                */
                ?>
                <ul class="galeria-imagenes">
                    <?php 
                        $i = 1;
                        foreach($galeria_imagenes_ID as $id):
                            //Si la posicion es 4 o 6, tamaño portrait, si no, tamaño square
                            $size = ($i == 4 || $i == 6) ? 'portrait' : 'square';
                            //Cogemos [0] porque si haces var_dump, vemos que en esa posicion se guarda la URL
                            $imagenThumb = wp_get_attachment_image_src($id, $size)[0];
                            //imagen en grande para el lightbox
                            $imagen = wp_get_attachment_image_src($id, 'full')[0];
                            ?>
                            <li>
                                <a href="<?php echo $imagen;?>" data-lightbox="galeria">
                                    <img src="<?php echo $imagenThumb; ?>"/>
                                </a>
                            </li>
                    <?php
                    $i++;
                        endforeach;
                    ?>
                </ul>

            <!--Escrito por: <?php //the_author(); ?> - <?php //the_date( 'd/m/Y, H:i', '<i>', '</i>' ); ?>-->

        <?php endwhile; ?>







        </div>
    </main>

<?php get_footer(); ?>