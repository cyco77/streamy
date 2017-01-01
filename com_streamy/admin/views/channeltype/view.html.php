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

class StreamyViewChannelType extends JViewLegacy
{
	public function display($tpl = null) 
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');		

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->form = $form;
		$this->item = $item;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{		
		JRequest::setVar('hidemainmenu', true);
	
		$isNew = ($this->item->id == 0);
		JToolBarHelper::title($isNew ? JText::_('COM_STREAMY_CHANNELTYPE_NEW') : JText::_('COM_STREAMY_CHANNELTYPE_EDIT'));
		JToolBarHelper::apply('channeltype.apply');
		JToolBarHelper::save('channeltype.save');
		JToolBarHelper::save2copy('channeltype.save2copy');
		JToolBarHelper::save2new('channeltype.save2new');
		JToolBarHelper::cancel('channeltype.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}
