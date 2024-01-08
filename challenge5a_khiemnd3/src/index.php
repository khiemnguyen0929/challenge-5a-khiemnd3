<?php

require('Router.php');

session_start();

$router = new Router;

$router->get('/', function() {
   include 'views/index.php';
});

$router->get('/login', function() {
    include 'views/login.php';
});

$router->get('/logout', function() {
    include 'views/logout.php';
});

$router->get('/me', function() {
    include 'views/profile.php';
});

$router->get('/exercises', function() {
    include 'views/exercises.php';
});

$router->get('/challenges', function() {
    include 'views/challenges.php';
});

$router->get('/students', function() {
    include 'views/students.php';
});

$router->get('/admin_list', function() {
    include 'views/list.php';
});

$router->get('/admin_messages', function() {
    include 'views/messages.php';
});

$router->get('/api/students', function() {
    include 'controllers/students.php';
});

$router->post('/api/login', function() {
    include 'controllers/login.php';
});

$router->post('/api/edit', function() {
    include 'controllers/profile.php';
});

$router->post('/api/change_password', function() {
    include 'controllers/change_password.php';
});

$router->post('/api/upload', function() {
    include 'controllers/upload.php';
});

$router->get('/api/exercises', function() {
    include 'controllers/exercises.php';
});

$router->post('/api/create_exercise', function() {
    include 'controllers/create_exercise.php';
});

$router->get('/api/delete_exercise', function() {
    include 'controllers/delete_exercise.php';
});

$router->post('/api/submit', function() {
    include 'controllers/submit_exercise.php';
});

$router->get('/api/challenges', function() {
    include 'controllers/challenges.php';
});

$router->post('/api/create_challenge', function() {
    include 'controllers/create_challenge.php';
});

$router->get('/api/delete_challenge', function() {
    include 'controllers/delete_challenge.php';
});

$router->post('/api/submit_challenge', function() {
    include 'controllers/submit_challenge.php';
});

$router->get('/api/all_users', function() {
    include 'controllers/all_users.php';
});

$router->post('/api/send_message', function() {
    include 'controllers/send_message.php';
});

$router->get('/api/get_message', function() {
    include 'controllers/get_message.php';
});

$router->run();



