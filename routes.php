<?php

// register routes
$router->map('GET', '/register', 'App\Controllers\RegisterController@showRegisterPage', 'register');
$router->map('POST', '/register', 'App\Controllers\RegisterController@postshowRegisterPage', 'register_post');
$router->map('GET', '/verify-account', 'App\Controllers\RegisterController@getVerifyAccount', 'verify_account');

// testimonial routes
$router->map('GET', '/testimonials', 'App\Controllers\TestimonialController@getShowTestimonials', 'testimonials');

// logged in user routes
if (App\auth\LoggedIn::user()) {
    $router->map('GET', '/add-testimonial', 'App\Controllers\TestimonialController@getShowAdd', 'add_testimonial');
    $router->map('POST', '/add-testimonial', 'App\Controllers\TestimonialController@postShowAdd', 'add_testimonial_post');
}

// login/logout routes
$router->map('GET', '/login', 'App\Controllers\AuthenticationController@showLoginPage', 'login');
$router->map('POST', '/login', 'App\Controllers\AuthenticationController@postShowLoginPage', 'login_post');
$router->map('GET', '/logout', 'App\Controllers\AuthenticationController@getLogoout', 'logout');

// admin routes
if ((App\auth\LoggedIn::user()) && (App\auth\LoggedIn::user()->access_level == 2)) {
    $router->map('POST', '/admin/page/edit', 'App\Controllers\AdminController@postSavePage', 'save_page');
    $router->map('GET', '/admin/page/add', 'App\Controllers\AdminController@getAddPage', 'add_page');
}

// Page routes
$router->map('GET', '/', 'App\Controllers\PageController@showHomePage', 'home');
$router->map('GET', '/page-not-found', 'App\Controllers\PageController@getShow404', '404');
$router->map('GET', '/[*]', 'App\Controllers\PageController@getShowPage', 'generic_page');
