<?php

use Core\Router;

Router::add('index', '/', '\App\Controllers\IndexController', 'index');
Router::add('login', '/login', '\App\Controllers\Auth\LoginController', 'index');
Router::add('register', '/register', '\App\Controllers\Auth\RegisterController', 'index');
Router::add('logout', '/logout', '\App\Controllers\Auth\LogoutController', 'index');
