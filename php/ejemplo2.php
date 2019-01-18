<?php

    /* 
        Ejemplo de como hacer uso de la Clase Persona.php
    */
    require 'Persona.php';

    $persona1 = new Persona;
    $persona2 = new Persona;

    $persona1->nombre='Maria';
    $persona1->estatura=1.45;
    $persona1->mostrar();

    echo '<br>';

    $persona2->nombre='Joaquin';
    $persona2->estatura=1.67;
    $persona2->mostrar();
?>