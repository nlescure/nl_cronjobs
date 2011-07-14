<?php
/**
 *
 */

$Module = $Params['Module'];
$scriptID = $Params['ScriptID'];

$tpl = eZTemplate::factory();
$tpl->setVariable( 'module', $Module );
//$tpl->setVariable( 'script', $script );

//get cronjobs.ini and global scripts
$ini = eZINI::instance( 'cronjob.ini' );
$globalScripts = $ini->variable( 'CronjobSettings', 'Scripts' );

//get cronjobs parts
$scripts = array();
foreach($ini->groups() as $groupName => $group) {
	//just get CronjobPart groups
	if(preg_match('/^CronjobPart-(.*)/i', $groupName, $matches) ) {
		//get scripts
		$scripts[$matches[1]] = $ini->variable( $groupName, 'Scripts' );
	}
}

//send variables to template
$tpl->setVariable( 'globalScripts', $globalScripts );
$tpl->setVariable( 'scripts', $scripts );

$Result = array();
$Result['content'] = $tpl->fetch( 'design:cronjobs/list.tpl' );
$Result['left_menu'] = "design:cronjobs/backoffice_left_menu.tpl";
$Result['path'] = array( array( 'url' => '/cronjobs/list/',
                                'text' => ezpI18n::tr( 'ezcronjobs', 'Cronjobs' ) ),
                         array( 'url' => false,
                                'text' => 'list' ) );

?>
