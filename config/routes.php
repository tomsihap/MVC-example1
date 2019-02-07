<?php

$routes = new Router;

$routes->get('hello', function() {
    echo 'hello world';
});

$routes->run();