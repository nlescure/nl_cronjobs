<?php
/**
 *
 */

$Module = $Params['Module'];

$tpl = eZTemplate::factory();
$tpl->setVariable( 'module', $Module );

$manager = ProcessManager::instance();

$tpl->setVariable( 'output', file_get_contents($root.$manager->getOutputFile()) );
$tpl->setVariable( 'errors', file_get_contents($root.$manager->getErrorFile()) );

$Result = array();
$Result['content'] = $tpl->fetch( 'design:cronjobs/logs.tpl' );
$Result['left_menu'] = "design:cronjobs/backoffice_left_menu.tpl";
//$Result['pagelayout'] = null;
$Result['path'] = '';


?>
