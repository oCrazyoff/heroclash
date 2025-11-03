<?php
$url = $_GET['url'] ?? '';
$url = trim($url, '/');

// rotas
$routes = [
    // auth
    '' => 'pages/login_form.php',
    'fazer_login' => 'backend/auth/login.php',
    'cadastro' => 'pages/cadastro_form.php',

    // usuarios comum
    'cartas' => 'pages/cartas.php',
    'aventura' => 'pages/aventura.php',
    'loja' => 'pages/loja.php',
];

if (array_key_exists($url, $routes)) {
    require $routes[$url];
    exit;
}

http_response_code(404);
require 'erro404.php';
