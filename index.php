<?php
require __DIR__ . '/vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_SERVER['REQUEST_URI'] !== '/'.$_ENV['INDEX_CONTROLLER']) {
    // Initial redirection
    header('Location: http://localhost:8000/'.$_ENV['INDEX_CONTROLLER']);
    exit();
}




// Get the part of the path after the controller name
$path = trim($_SERVER['REQUEST_URI'], '/');
$parts = explode('/', $path);

// Get controller name
$controllerName = array_shift($parts);

// Obtener el nombre del método (o acción)
$action = array_shift($parts);

// Get the name of the method (or action)
$controllerClass = "Abner\\Desis\\Controllers\\{$controllerName}Controller";

// Check if the controller class exists
if (class_exists($controllerClass)) {
    // Create an instance of the controller
    $controllerInstance = new $controllerClass();

    // Verify if the method (action) is set and exists in the controller
    if (!$action || !method_exists($controllerInstance, $action)) {
        // If no method name is provided or the method does not exist, use the method "index".
        $action = 'index';
    }

    // Call method (action)
    $controllerInstance->$action();
} else {
    echo "Controlador no encontrado.";
}
