<?php
define('WEBROOT', '/var/www/lhcms20/');

include_once './libs/smarty/Smarty.class.php';
$smarty = new Smarty();

$smarty->template_dir = WEBROOT.'smartyFiles/templates/';
$smarty->compile_dir = WEBROOT.'smartyFiles/templates_c/';
$smarty->config_dir = WEBROOT.'smartyFiles/configs/';
$smarty->cache_dir = WEBROOT.'smartyFiles/cache/';
$smarty->caching = false;
$smarty->assign('name','quickhot');
$smarty->display('testSmarty.tpl');