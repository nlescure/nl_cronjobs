<?php
/**
 * Display logs
 */

$Module = $Params['Module'];

$tpl = eZTemplate::factory();
$tpl->setVariable( 'module', $Module );

$manager = ProcessManager::instance();

$tpl->setVariable( 'output', file_get_contents($manager->getOutputFile()) );
$tpl->setVariable( 'errors', file_get_contents($manager->getErrorFile()) );

$Result = array();
$Result['content'] = $tpl->fetch( 'design:cronjobs/logs.tpl' );
$Result['left_menu'] = "design:cronjobs/backoffice_left_menu.tpl";
//$Result['pagelayout'] = null;
$Result['path'] = array( array( 'url' => '/cronjobs/logs/',
                                'text' => ezpI18n::tr( 'ezcronjobs', 'Cronjobs' ) ),
                         array( 'url' => false,
                                'text' => 'logs' ) );



?>
