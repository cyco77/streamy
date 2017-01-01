<?php
/*------------------------------------------------------------------------
# com_streamy - Streamy!
# ------------------------------------------------------------------------
# author    Lars Hildebrandt
# copyright Copyright (C) 2012 Lars Hildebrandt. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://joomla.larshildebrandt.de
# Technical Support:  Forum - http://joomla.larshildebrandt.de/forum/index.html
-------------------------------------------------------------------------*/

// no direct access
defined('_JEXEC') or die('Restricted access');

defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by ChannelViewer
$controller = JControllerLegacy::getInstance('Streamy');

$task	= JRequest::getCmd('task');

switch ($task)
{
	case 'orderup':
		$controller->orderItems( -1 );
		break;
	case 'orderdown':
		$controller->orderItems( 1 );
		break;
	case 'saveorder':
		$controller->saveorder();
		break;
	case 'publish':
		$controller->publish(1);
		break;
	case 'unpublish':
		$controller->publish(-1);
		break;		
	default:
	{
		// Perform the Request task
		$controller->execute( JRequest::getVar('task'));	
		break;
	}
}

// Redirect if set by the controller
$controller->redirect();
