<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//rotas dos Usuarios

$route['user'] = 'UserController';
$route['update-sponsor'] = 'SponsorController/update';
$route['visit'] = 'UserController/visit';
$route['create-visit'] = 'UserController/create';


//rotas das Entidades

$route['update-sponsor-form/(:num)'] = 'SponsorController/update_form/$1';
$route['update-sponsor'] = 'SponsorController/update';

//rotas das Bandas


$route['update-band-form/(:num)'] = 'BandController/update_form/$1';
$route['update-band'] = 'BandController/update';
$route['band-music/(:num)'] = 'BandController/band_music/$1';
$route['delete-music-band/(:num)/(:any)'] = 'BandController/deleteMusic/$1/$2';
//rotas das Equipes

$route['update-music-form/(:num)'] = 'MusicController/update_form/$1';
$route['update-music'] = 'MusicController/update';
$route['download/(:num)'] = 'MusicController/download/$1';
//rotas de Pessoas

$route['update-event-form/(:num)'] = 'EventController/update_form/$1';
$route['update-event'] = 'EventController/update';
$route['delete-event-band/(:num)/(:any)'] = 'EventController/deleteBand/$1/$2';
$route['delete-event-sponsor/(:num)/(:any)'] = 'EventController/deleteSponsor/$1/$2';
$route['info-event/(:num)'] = 'EventController/call_infoEventView/$1/';

//rotas do login
$route['login'] = 'loginController';
$route['login-sigin'] = 'loginController/sigin';
$route['logout'] = 'loginController/logout';

