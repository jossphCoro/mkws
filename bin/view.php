<?php
class View
    {
        function __construct()
        {

            //echo "<p>Clase base del View</p>";
                
        }    
            function Vista($nombre, $data = array()){
                extract($data);
                require_once 'view/'.$nombre.'.php';

            }
    }
?>