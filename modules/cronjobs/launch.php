<?php
/**
 * Get cronjobs part and launch it 
 */

$Module = $Params['Module'];

$tpl = eZTemplate::factory();
$tpl->setVariable( 'module', $Module );
$http = eZHTTPTool::instance();

//get the part
if($http->hasPostVariable('part')) {
	$part = $http->postVariable('part');
}
else {
	$part = '';
}

//special case : "global" means nothing for runcronjobs
if( $part == 'global' ) {
	$part = '';
} 

//create the manager, add scripts, and launch them
$manager = ProcessManager::instance();
$manager->addScript("runcronjobs.php $part");
$manager->execAll();

eZExecution::cleanExit();

?>
