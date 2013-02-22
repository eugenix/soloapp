<?php
/**
 * точка входа в приложение
 *
 * PHP version 5
 *
 * @package  Application
 * @author   Andrey Filippov <afi@i-loto.ru>
 */

use Solo\Core\BaseApplication;
use App\Application;

require_once "../vendor/autoload.php";

$basePath = "../";
$config = dirname(__FILE__) . "/../config/local.php";

Application::createApplication($basePath, $config);
Application::getInstance()->handleRequest();

