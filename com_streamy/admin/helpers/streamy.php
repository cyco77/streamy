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

class StreamyHelper extends JHelperContent  {

	public static function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_STREAMY_SUBMENU_CHANNELS'),
			'index.php?option=com_streamy&view=channels',
			$vName == 'channels'
			);
		
		JHtmlSidebar::addEntry(
			JText::_('COM_STREAMY_SUBMENU_CHANNELTYPES'),
			'index.php?option=com_streamy&view=channeltypes',
			$vName == 'channeltypes'
			);
	}
}