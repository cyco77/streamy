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

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

class StreamyModelChannel extends JModelItem
{
	protected $_data;

	public function getTable($type = 'Channel', $prefix = 'StreamyTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getData($id)
	{
		if (empty( $this->_data )) {
			$db = JFactory::getDBO();			
			$query = ' SELECT c.id,c.name,c.url,c.width,c.height,c.chaturl,c.published,c.ordering, t.url as urltemplate FROM #__streamy_channel c INNER JOIN #__streamy_channeltype t ON c.typeid = t.id'.
				'  WHERE c.id = '.(int)$id;  
			$db->setQuery( $query );
			$this->_data = $db->loadObject();
		}
		
		return $this->_data;
	}
}
