<?php
/**
 * File containing the module definition.
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 *
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
?>
