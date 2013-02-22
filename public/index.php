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

require_once "../Solo/Core/BaseApplication.php";
require_once '../App/Application.php';


new Smarty();

$basePath = "../";
$config = dirname(__FILE__) . "/../config/local.php";

Application::createApplication($basePath, $config);
Application::getInstance()->handleRequest();

