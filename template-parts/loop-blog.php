<li class="card gradient">
    <?php 
        the_post_thumbnail('mediano');  
        
        //Sacamos las categorias
        the_category();
    ?>
    <div class="contenido">
        <a href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
        </a>
        <p class="meta">
            <span>Por:</span>
            <a
                href="<?php echo get_author_posts_url(get_the_author_meta('ID')); //Redireccionamos al post, pasandole el id de quien lo ha escrito. ?>">
                <?php 
                    //Sacamos el alias del usuario
                    echo get_the_author_meta('nickname'); 
                ?>
            </a>
        </p>
        <p class="meta">
            <span>Fecha:</span>
            <?php 
                //Sacamos la fecha en la que fue escrito el post
                the_time( get_option('date_format')); 
            ?>
        </p>
    </div>
</li>