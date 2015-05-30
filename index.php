<?php
error_reporting (E_ALL);

require_once("vendor/autoload.php");

const FULL_PATH = __DIR__;

use App\Router;
use App\Registry;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/app/model/"), $isDevMode);

$conn = array(
    'driver'   => 'pdo_mysql',
    'host'     => '127.0.0.1',
    'dbname'   => 'enrollee',
    'user'     => 'root',
    'password' => ''
);

function pp($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

$registry = Registry::getInstance();

$router = new Router($registry);
$entityManager = EntityManager::create($conn, $config);

$registry->router = $router;
$registry->entityManager = $entityManager;

$router->setPath("/app/controller/");
$router->delegate();
