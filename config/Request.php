<?php


/**
 * Holds the registered routes
 *
 * @var array $routes
 */
$routes = [];

/**
 * Register a new route
 *
 * @param $action string
 */
function route($action, callable $callback)
{
    global $routes;
    $action = trim($action, '/');
    $routes[$action] = $callback;
}

/**
 * Dispatch the router
 *
 * @param $action string
 */
function dispatch($action, callable $callback)
{
    global $routes;
    $action = trim($action, '/');
    $action = str_replace('+', ' ', $action);
    $action = urldecode($action);
    $callback = $routes[$action];

    echo call_user_func($callback);
}
