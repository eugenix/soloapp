<?php
/**
 * Здесь описываются настройки роутинга
 *
 * PHP version 5
 *
 * @package Config
 * @author  Andrey Filippov <afi.work@gmail.com>
 */

$route = new Solo\Core\Route();

//
// представления
//
$route->add("/", 'App\Views\IndexView');
$route->add("/view/ajax", 'App\Views\AjaxView');

//
// действия
//
$route->add("/action/test", 'App\Actions\TestAction');


// Возвращаем объект Route
return $route;
