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

require_once JPATH_COMPONENT . '/helpers/streamy.php';

class StreamyViewChannelTypes extends JViewLegacy
{
	protected $items;

	protected $pagination;

	protected $state;
	
	function display($tpl = null) 
	{
		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		
		// Preprocess the list of items to find ordering divisions.
		// TODO: Complete the ordering stuff with nested sets
		foreach ($this->items as &$item) {
			$item->order_up = true;
			$item->order_dn = true;
		}

		// Set the toolbar
		$this->addToolBar();
		
		StreamyHelper::addSubmenu('channeltypes');
		
		$this->sidebar = JHtmlSidebar::render();

		// Display the template
		parent::display($tpl);
	}

	protected function addToolBar() 
	{
		JToolBarHelper::title(JText::_('COM_STREAMY_CHANNELTYPES'));
		JToolBarHelper::addNew('channeltype.add');
		JToolBarHelper::editList('channeltype.edit');
		JToolBarHelper::divider();
		JToolBarHelper::publishList('channeltypes.publish');
		JToolBarHelper::unpublishList('channeltypes.unpublish');	
		JToolBarHelper::divider();
		JToolBarHelper::deleteList('', 'channeltypes.delete');	
		JToolBarHelper::divider();
		JToolBarHelper::preferences('com_streamy',400,650);		
		
		JHtmlSidebar::setAction('index.php?option=com_streamy&view=channeltypes');
		
		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_PUBLISHED'),
			'filter_published',
			JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true)
			);
	}
	
	protected function getSortFields()
	{
		return array(
			'c.name' => JText::_('COM_STREAMY_CHANNELTYPE_HEADING_NAME'),
			'c.ordering' => JText::_('COM_STREAMY_CHANNEL_HEADING_ORDERING'),
			'c.published' => JText::_('COM_STREAMY_CHANNEL_HEADING_PUBLISHED'),
			'c.id' => JText::_('COM_STREAMY_CHANNEL_HEADING_ID')
			);
	}
}
