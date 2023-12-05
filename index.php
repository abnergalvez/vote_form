<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax_controller']) && isset($_POST['ajax_method'])) {
    $ajaxController = $_POST['ajax_controller'];
    $ajaxMethod = $_POST['ajax_method']; 
    handleAjaxRequest($ajaxController, $ajaxMethod);
    exit();
}

if ($_SERVER['REQUEST_URI'] === '/') {
    header('Location: http://localhost:8000/'.$_ENV['INDEX_CONTROLLER']);
    exit();
}

$path = trim($_SERVER['REQUEST_URI'], '/');
$parts = explode('/', $path);

$controllerName = array_shift($parts);
$action = array_shift($parts);
$controllerClass = "Desis\\Controllers\\{$controllerName}Controller";

if (class_exists($controllerClass)) {
    $controllerInstance = new $controllerClass();

    if (!$action || !method_exists($controllerInstance, $action)) {
        $action = 'index';
    }

    $controllerInstance->$action();
} else {
    echo "Controlador no encontrado.";
}


function handleAjaxRequest($ajaxController, $ajaxMethod)
{
    $controllerClass = "Desis\\Controllers\\{$ajaxController}Controller";

    if (class_exists($controllerClass)) {
        $controllerInstance = new $controllerClass();

        if (method_exists($controllerInstance, $ajaxMethod)) {
            $controllerInstance->$ajaxMethod();
        } else {
            echo "Método no encontrado.";
        }
    } else {
        echo "Controlador no encontrado.";
    }
}
