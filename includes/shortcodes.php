<?php 

//Shortcode para el mapa [gymfitness_ubicacion]
function gymfitness_ubicacion_shortcode(){

    //Funcion de Advanced Custom Fileds (get_field), recordar
    $ubicacion = get_field('ubicacion');

    ?>

    <!-- Campos ocultos para hacer dinámicas las variables en el script -->
    <div class="ubicacion">
        <input type="hidden" id="lat" value="<?php echo $ubicacion['lat'] ?>"/>
        <input type="hidden" id="lng" value="<?php echo $ubicacion['lng'] ?>"/>
        <input type="hidden" id="direccion" value="<?php echo $ubicacion['address'] ?>"/>
    </div>
    <!-- Div donde mostramos el mapa -->
    <div id="mapa"></div>

    <?php
    /*echo "<pre>";
    var_dump($ubicacion);
    echo "</pre>";*/
}
add_shortcode( 'gymfitness_ubicacion', 'gymfitness_ubicacion_shortcode' );











?>