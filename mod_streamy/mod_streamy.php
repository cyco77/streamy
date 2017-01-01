<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);

jimport( 'joomla.application.component.helper' );

$db = JFactory::getDBO();

$channelid = $params->get( 'channelid', '' );
$width = $params->get( 'width', '150' ); 
$height = $params->get( 'height', '100' ); 
													
													        
if (is_numeric($channelid)) {
	// Server-Datensatz holen
	$query = ' SELECT c.url, t.url as urltemplate FROM #__streamy_channel c INNER JOIN #__streamy_channeltype t ON c.typeid = t.id'.
			 '  WHERE c.id = '.$channelid;  

	$db->setQuery($query);      
        
	$channel = $db->loadObject();

	require(JModuleHelper::getLayoutPath('mod_streamy'));
}