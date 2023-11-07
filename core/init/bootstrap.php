<?php
const APP = ROOT . 'app' . DS;
const CONTROLLER = APP . 'controllers' . DS;
const MODEL = APP . 'models' . DS;
const VIEW = APP . 'views'. DS;
const LAYOUT = APP . 'layouts' . DS;
const API = APP . 'API' . DS;
const CONFIG = ROOT . 'config' . DS;
const CORE = ROOT . 'core' . DS;
const UPLOAD = ROOT . 'uploads' . DS;
const VND = ROOT . 'vendor' . DS;

require_once CORE . 'init' . DS . 'Config.core.php';
Config::loadEnv(ROOT . '.env');

$g = glob(CONFIG . '*.config.php');

foreach($g as $f) {
    require_once $f;
}

spl_autoload_register(function($class) {
    if(file_exists(CONTROLLER . $class . DS . $class . '.controller.php')) {
       require_once CONTROLLER . $class . DS . $class . '.controller.php';
    } else if(file_exists(MODEL . $class . DS . $class . '.controller.php')) {
        require_once MODEL . $class . DS . $class . '.model.php';
    } else if(file_exists(CORE . $class . '.core.php')) {
        require_once CORE . $class . '.core.php';
    }
});