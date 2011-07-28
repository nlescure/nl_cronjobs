<?php
/**
 * File containing the module definition.
 */

$Module = array( 'name' => 'NL Cronjobs' );

$ViewList = array();

$ViewList['list'] = array(
    'script' => 'list.php',
    'default_navigation_part' => 'nlcronjobnavigationpart'
);

$ViewList['launch'] = array(
    'script' => 'launch.php',
    'default_navigation_part' => 'nlcronjobnavigationpart'
);
    
$ViewList['logs'] = array(
    'script' => 'logs.php',
    'default_navigation_part' => 'nlcronjobnavigationpart'
);

$ViewList['clear'] = array(
    'script' => 'clear.php',
    'default_navigation_part' => 'nlcronjobnavigationpart'
);

?>
