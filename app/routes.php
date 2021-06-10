<?php

$router->get('', 'ControllerMain@index');
$router->post('register', 'ControllerMain@register');
$router->get('login', 'ControllerMain@showLogin');
$router->post('login', 'ControllerMain@loginUser');

$router->get('user', 'ControllerMain@table');
$router->post('delete', 'ControllerMain@delete');
$router->post('update', 'ControllerMain@update');

$router->get('admin', 'ControllerMain@showAdmin');
$router->post('addTask', 'ControllerMain@addTask');
$router->post('addTaskList', 'ControllerMain@addTaskList');

$router->get('users', 'ControllerMain@userPage');
$router->post('logout', 'ControllerMain@logOut');