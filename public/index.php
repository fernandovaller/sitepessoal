<?php
//defined, is a boolean.
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../app'));
const DS = DIRECTORY_SEPARATOR;

require APPLICATION_PATH . DS . 'config' . DS . 'config.php';

//index.php?page=proeducts
//$page  = get('page','home');
$page = getURL(1, 'home');

$model = $config['MODEL_PATH'] . $page . '.php';
$view  = $config['VIEW_PATH'] . $page . '.phtml';
$_404  = $config['VIEW_PATH'] . '404.phtml';

//Carrega o model
if(file_exists($model)) { require $model; }

//Carrega a view 
$page_view = $_404;
if(file_exists($view)) { $page_view = $view; }

include $config['VIEW_PATH']. 'index.phtml';

/*echo '<pre>';
var_dump($page);
var_dump($model);
var_dump($view);
echo '</pre>';*/