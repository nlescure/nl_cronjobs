<?php
/**
 *
 */

$Module = $Params['Module'];

$tpl = eZTemplate::factory();
$tpl->setVariable( 'module', $Module );

$root = '/var/www/ezpublish_2011_6/';
$manager = ProcessManager::instance($root);

$tpl->setVariable( 'output', file_get_contents($root.$manager->getOutputFile()) );
$tpl->setVariable( 'errors', file_get_contents($root.$manager->getErrorFile()) );

$Result = array();
$Result['content'] = $tpl->fetch( 'design:cronjobs/logs.tpl' );
$Result['left_menu'] = "design:cronjobs/backoffice_left_menu.tpl";
//$Result['pagelayout'] = null;
$Result['path'] = '';


?>
