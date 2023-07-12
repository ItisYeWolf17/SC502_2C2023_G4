<?php

    foreach($alertas as $key => $mensajes):
        foreach($mensajes as $mensaje) :
?> 
    <link rel="stylesheet" href="./assets/css/style.css">
    <div class="alerta <?php echo $key; ?>">
            <?php echo $mensaje;?>
    </div>
<?php

        endforeach;
    endforeach;


?>