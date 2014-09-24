<?php
/**
 * Clear logs
 */

$Module = $Params['Module'];

$tpl = eZTemplate::factory();
$tpl->setVariable( 'module', $Module );

$http = eZHTTPTool::instance();
$manager = ProcessManager::instance();
$outputs = array();

if( $http->hasVariable('log_output') ) {
	$manager->cleanOutputFile();
	$outputs[] = ezpI18n::tr( 'extension/nlcronjobs', 'Output file cleared.' );
}
if( $http->hasVariable('log_error') ) {
	$manager->cleanErrorFile();
	$outputs[] = ezpI18n::tr( 'extension/nlcronjobs', 'Error file cleared.' );
}

$tpl->setVariable( 'outputs', $outputs );

$Result = array();
$Result['content'] = $tpl->fetch( 'design:cronjobs/clear.tpl' );
$Result['left_menu'] = "design:cronjobs/backoffice_left_menu.tpl";
$Result['path'] = array( array( 'url' => '/cronjobs/clear/',
                                'text' => ezpI18n::tr( 'ezcronjobs', 'Cronjobs' ) ),
                         array( 'url' => false,
                                'text' => 'clear' ) );

?>
