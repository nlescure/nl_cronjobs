<?php
/**
 * List all active and not forbidden cronjobs parts
 */

$Module = $Params['Module'];
$scriptID = $Params['ScriptID'];

$tpl = eZTemplate::factory();
$tpl->setVariable( 'module', $Module );

//get forbidden parts
$nlCronjobsIni = eZINI::instance( 'nlcronjobs.ini' );
$forbiddenParts = $nlCronjobsIni->variable( 'Forbidden', 'Parts' );

//get cronjobs.ini and global scripts
$ini = eZINI::instance( 'cronjob.ini' );
$globalScripts = array();
if( !in_array('global',$forbiddenParts)  ) {
	$globalScripts = $ini->variable( 'CronjobSettings', 'Scripts' );
}


//get cronjobs parts
$scripts = array();
foreach($ini->groups() as $groupName => $group) {
	
	//just get CronjobPart groups (i.e. CronjobPart-frequent => frequent)
	if(preg_match('/^CronjobPart-(.*)/i', $groupName, $matches) ) {
		//if the cronjobs part is not forbidden
		if( !in_array($matches[1],$forbiddenParts)  ) {
			//get scripts
			$scripts[$matches[1]] = $ini->variable( $groupName, 'Scripts' );
		}
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
