<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/beranda';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['beranda'] = 'home/beranda';
$route['beranda/(:any)'] = 'home/beranda/$1';
