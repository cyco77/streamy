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

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldChannel extends JFormFieldList
{
	protected $type = 'Channel';

	protected function getOptions() 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id,name');
		$query->from('#__streamy_channel');
		$query->where('published = 1');
		$query->order('name');
		$db->setQuery((string)$query);
		$leagues = $db->loadObjectList();
		$options = array();
		if ($leagues)
		{
			foreach($leagues as $league) 
			{
				$options[] = JHtml::_('select.option', $league->id, $league->name);
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}

?>