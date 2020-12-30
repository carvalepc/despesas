<?php

require 'inc/configuration.php';
require 'inc/Slim-2.x/Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

// GET route
$app->get(
    '/',
    function () {

        require_once("view/lista-despesas.php");
        
    }
);

$app->get(
    '/lista-despesas',
    function () {

        require_once("view/lista-despesas.php");
        
    }
);

$app->get("/search-:id_data", function($id_data){

    $sql = new Sql();

    $data = $sql->select("SELECT * FROM despesas.balancos where data >= '$id_data';");

    foreach ($data as &$despesa) {

        $despesa['Valor'] = 'R$ '. number_format($despesa['Valor'], 2, ",", ".");
        $despesa['Data'] = date('d/m/Y', strtotime($despesa['Data']));
    }

    echo json_encode($data);


});

$app->get('/dtotal-:id_data', function($id_data){

    $sql = new Sql();

    $data = $sql->select("SELECT SUM(Valor) as Total  FROM  despesas.balancos where data >= '$id_data';");

    foreach ($data as &$despesa) {

        $despesa['Total'] = 'R$ '. number_format($despesa['Total'], 2, ",", ".");

    }

    echo json_encode($data);

});


$app->run();
