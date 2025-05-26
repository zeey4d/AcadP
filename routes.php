<?php


// user show
$router->get('/users_index_view', 'views/users/index_view.php');
$router->get('/users_create_view', 'views/users/create_view.php');

// card show
$router->get('/show_view', 'views/research/show_view.php');

//home page
$router->get('/cart_view', 'views/cart_view.php');
$router->get('/about', 'views/about_view.php');
$router->get('/contact', 'views/contact_view.php');


// research page
$router->get('/manage_view', 'views/research/manage_view.php');
$router->get('/research', 'views/research_view.php');
$router->get('/create_view', 'views/research/create_view.php');
$router->get('/research_view', 'views/research_view.php');




$router->get('/pdfs_view', 'views/pdfs/pdfs_view.php');






//.......................

$router->get('/', 'controlers/index.php');
$router->get('/about', 'controlers/about.php');
$router->get('/contact', 'controlers/contact.php');
$router->get('/research', 'controlers/research.php');






$router->get('/manage', 'controlers/research/manage.php');
$router->get('/show', 'controlers/research/show.php');
$router->get('/cart', 'controlers/cart.php')->only('registered');
$router->post('/research_addff', 'controlers/research/add.php')->only('registered');



$router->get('/pdf', 'controlers/pdf.php');


// $router->get('/create', 'controlers/research/create.php')->only('guest');

// $router->get('/research', 'controlers/research.php');


$router->get('/create', 'controlers/create.php');
$router->post('/create', 'controlers/create.php');

// $router->get('/research', 'controlers/research/create.php')->only('guest');






$router->get('/users_index','controlers/users/index.php');
$router->get('/users_create','controlers/users/create.php')->only('guest');
$router->post('/users_store','controlers/users/store.php');


$router->post('/register','controlers/registertion/store.php');

$router->get('/login','controlers/sessions/create.php')->only('guest');
$router->delete('/logout','controlers/sessions/destroy.php')->only('auth');
$router->post('/login','controlers/sessions/store.php');


$router->get('/sessions_create', 'controlers/sessions/create.php')->only('guest');
$router->delete('/sessions_destroy', 'controlers/sessions/destroy.php')->only('registered');
$router->post('/sessions_store', 'controlers/sessions/store.php')->only('guest');


$router->get('/download','controlers/pdfs/download.php');

