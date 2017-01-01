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

// import Joomla view library
jimport('joomla.application.component.view');

class StreamyViewChannel extends JViewLegacy
{
	// Overwriting JView display method
	function display($tpl = null) 
	{
		$id = JRequest::getVar( 'id', '', 'default', 'int' );
		
		$model = $this->getModel();
		$item = $model->getData($id);

		if ($item == null) 
		{
			JError::raiseError(500, 'Item is null: id='.$id);
			return false;
		}

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		$this->assignRef('item',$item);
		
		$params = JComponentHelper::getParams( 'com_streamy' ); 
		$this->assignRef('params',$params);		
		
		// Display the view
		parent::display($tpl);
	}
}
