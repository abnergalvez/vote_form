<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Si la solicitud es un POST, maneja la solicitud AJAX aquí
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax_controller']) && isset($_POST['ajax_method'])) {
    $ajaxController = $_POST['ajax_controller'];
    $ajaxMethod = $_POST['ajax_method'];
    
    // Llama al controlador y método específicos para manejar la solicitud AJAX
    handleAjaxRequest($ajaxController, $ajaxMethod);
    exit();
}

// Si la solicitud no es un POST o una solicitud AJAX, continúa con el enrutamiento normal
if ($_SERVER['REQUEST_URI'] === '/') {
    // Redirección inicial
    header('Location: http://localhost:8000/'.$_ENV['INDEX_CONTROLLER']);
    exit();
}

// Obtén la parte de la ruta después del nombre del controlador
$path = trim($_SERVER['REQUEST_URI'], '/');
$parts = explode('/', $path);

// Obtén el nombre del controlador
$controllerName = array_shift($parts);

// Obtén el nombre del método (o acción)
$action = array_shift($parts);

// Obtén el nombre del método (o acción)
$controllerClass = "Desis\\Controllers\\{$controllerName}Controller";

// Verifica si la clase del controlador existe
if (class_exists($controllerClass)) {
    // Crea una instancia del controlador
    $controllerInstance = new $controllerClass();

    // Verifica si el método (acción) está configurado y existe en el controlador
    if (!$action || !method_exists($controllerInstance, $action)) {
        // Si no se proporciona un nombre de método o el método no existe, usa el método "index"
        $action = 'index';
    }

    // Llama al método (acción)
    $controllerInstance->$action();
} else {
    echo "Controlador no encontrado.";
}

// Función para manejar solicitudes AJAX
function handleAjaxRequest($ajaxController, $ajaxMethod)
{
    // Construye el nombre de la clase del controlador
    $controllerClass = "Desis\\Controllers\\{$ajaxController}Controller";

    // Verifica si la clase del controlador existe
    if (class_exists($controllerClass)) {
        // Crea una instancia del controlador
        $controllerInstance = new $controllerClass();

        // Verifica si el método existe en el controlador
        if (method_exists($controllerInstance, $ajaxMethod)) {
            // Llama al método específico del controlador
            $controllerInstance->$ajaxMethod();
        } else {
            echo "Método no encontrado.";
        }
    } else {
        echo "Controlador no encontrado.";
    }
}
