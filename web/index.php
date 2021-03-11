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
    

    $dbopts = parse_url(getenv('http://localhost/phpmyadmin/db_structure.php?server=1&db=dbprueba_heroku'));
    $app->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
               array(
                'pdo.server' => array(
                   'driver'   => 'pgsql',
                   'user' => $dbopts["herokuAdmin"],
                   'password' => $dbopts["12345"],
                   'host' => $dbopts["localhost"],
                   'port' => $dbopts["port"],
                   'dbname' => ltrim($dbopts["path"],'/dbprueba_heroku')
                   )
               )
);

$app->get('/db/', function() use($app) {
    $st = $app['pdo']->prepare('SELECT name FROM test_table');
    $st->execute();
  
    $names = array();
    while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
      $app['monolog']->addDebug('Row ' . $row['name']);
      $names[] = $row;
    }
  
    return $app['twig']->render('database.twig', array(
      'names' => $names
    ));
  });

?>