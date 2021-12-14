<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


//$routes->add('dashboard-main','Home::dashboard');
//$routes->add('login-main','Home::login');
$myroutes = [];
$myroutes['dashboard-routes'] ='Dashboard::dashboard_controller';
$myroutes['home-routes'] ='Home::home_controller';
$myroutes['login-routes'] ='Auth::login_controller';
$myroutes['register-routes'] ='Auth::register_controller';
$myroutes['insert'] ='Valeo::insert';


$routes->map($myroutes);

$routes->set404Override(function(){
    return view('errors/custom_errors');
});

$routes->group('', ['filter' => 'isLoggedIn'], function($routes){
    $routes->get('','Dashboard::dashboard_controller');
    $routes->get('dashboard_controller','Dashboard::dashboard_controller');
    $routes->get('dashboard/edit','Dashboard::edit');
    $routes->get('dashboard/avatar','Dashboard::avatar');
    $routes->get('dashboard/login_activity','Dashboard::login_activity');
    $routes->get('dashboard/change_password','Dashboard::change_password');

    $routes->get('','Valeo::valeo_controller');
    $routes->get('Valeo/valeo_controller','Valeo::valeo_controller');

    $routes->get('AdminDashboard/admin_dashboard_controller','AdminDashboard::admin_dashboard_controller');

    

});

    //  JQuery AJAX CRUD - Employee Data
    $routes->post('valeo/insert','Valeo::insert');
    $routes->post('valeo/getdata','Valeo::fetch');
    $routes->post('valeo/viewemployee','Valeo::view');
    $routes->post('valeo/edit','Valeo::edit');
    $routes->post('valeo/update','Valeo::update');
    $routes->post('valeo/delete','Valeo::delete');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
