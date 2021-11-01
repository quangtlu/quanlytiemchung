<?php
require "../Home/Core/Database.php";
require "../Home/Models/BaseModel.php";
require "../Admin/Controllers/BaseController.php";
$controllerName = ucfirst($_REQUEST['controller']  ?? 'Home'). 'Controller';
$actionName = $_REQUEST['action']  ?? 'index';

require "../Admin/Controllers/${controllerName}.php";

$controllerObject = new $controllerName;

$controllerObject->$actionName();