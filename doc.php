<?php


require("vendor/autoload.php");
$swagger = \Swagger\scan('apidoc');

header('Content-Type: application/json');
echo $swagger;
