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

// import Joomla controller library
jimport('joomla.application.component.controller');

class StreamyController extends JControllerLegacy
{
	function display($cachable = false, $urlparams = false) 
	{
		// set default view if not set
		JRequest::setVar('view', JRequest::getCmd('view', 'Channels'));

		// call parent behavior
		parent::display($cachable);
	}
	
	function publish($state){
		$this->setRedirect( 'index.php?option=com_streamy' );

		// Initialize variables
		$db			=& JFactory::getDBO();
		$user		=& JFactory::getUser();
		$cid		= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$task		= JRequest::getCmd( 'task' );
		$publish	= ($state == '1');
		$n			= count( $cid );

		if (empty( $cid )) {
			return JError::raiseWarning( 500, JText::_( 'No items selected' ) );
		}

		JArrayHelper::toInteger( $cid );
		$cids = implode( ',', $cid );

		$query = 'UPDATE #__streamy_channels'
			. ' SET published = ' . (int) $publish
			. ' WHERE id IN ( '. $cids .' )';
		
		$db->setQuery( $query );
		if (!$db->query()) {
			return JError::raiseWarning( 500, JText::_( 'No items selected' ) );
		}
		$this->setMessage( JText::sprintf( $publish ? 'Items published' : 'Items unpublished', $n ) );
	}
}
