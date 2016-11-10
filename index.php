<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use Swagger\Serializer;

$serializer = new Serializer();
$swagger = $serializer->deserialize(file_get_contents('apidoc/out.json'), 'Swagger\Annotations\Swagger');
echo $swagger;


