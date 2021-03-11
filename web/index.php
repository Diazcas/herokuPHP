<?php
// imprimir en pantalla
    echo "hola mundo </br>";
    print ("esto es una cadena impresa por print </br>");

// variables
    $n = 1;
    $altura = 1.6;

// cadena
    $str = 'esto es una cadena $altura';
    $str2 = 'estos es otra cadena $n';

//array
    $array = array('nombre' => "Juan",
                    'edad' => "24",
                    'domicilio'  => "calle manzana 115");
    $paises = array('Mexico', 'Chile', 'Argentina');

    $array['nombre'];
    $paises[1];

    print_r($array);
    var_dump($paises);

    $url = parse_url(getenv("mysql://ba7db65152eaec:84bd82d1@us-cdbr-east-03.cleardb.com/heroku_fd5e5ffbd5dfc59?reconnect=true"));

    $server = $url["us-cdbr-east-03.cleardb.com"];
    $username = $url["ba7db65152eaec"];
    $password = $url["84bd82d1"];
    $db = substr($url["path"], 1);

    $conn = new mysqli($server, $username, $password, $db);

?>