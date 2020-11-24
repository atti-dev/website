<?php 
## To Sart The Development Server
## php -S localhost:8000

## For Production Deployment
## composer.phar install --no-ansi --no-dev --no-interaction --no-plugins --no-progress --no-scripts --optimize-autoloader

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
function custom_autoloader($className) {
    include './core/' . $className . '.php';
}
spl_autoload_register('custom_autoloader');
require __DIR__ . '/vendor/autoload.php';
include_once('./core/database.php');

use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Url;
// use Pecee\Http\Response;
// use Pecee\Http\Request;

Router::get('/api/courses', 'CourseController@index');
Router::get('/api/courses/{id}', 'CourseController@show');
Router::get('/api/courses/show/{id}', 'CourseController@showWithList');
Router::get('/api/search', 'CourseController@search');
Router::get('/api/filter', 'CourseController@filter');

Router::get('/api/applications/{id_number}/{course_id}', 'ApplicationController@show');
Router::post('/api/applications', 'ApplicationController@create');
Router::get('/api/download/applications/{id}', 'ApplicationController@download');

Router::post('/api/register', 'RegistrationController@create');
Router::post('/api/register/{id_number}', 'RegistrationController@update');
Router::post('/api/upload', 'RegistrationController@fileUpload');

Router::post('/api/contact', 'ContactController@create');

Router::start();