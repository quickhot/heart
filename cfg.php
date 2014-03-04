<?php
//change local dir
define('WEBROOT', $_SERVER['DOCUMENT_ROOT'].'/');
include_once WEBROOT.'libs/smarty/Smarty.class.php';
$smarty = new Smarty();

$smarty->template_dir = WEBROOT.'smartyFiles/templates/';
$smarty->compile_dir = WEBROOT.'smartyFiles/templates_c/';
$smarty->config_dir = WEBROOT.'smartyFiles/configs/';
$smarty->cache_dir = WEBROOT.'smartyFiles/cache/';
$smarty->caching = false;