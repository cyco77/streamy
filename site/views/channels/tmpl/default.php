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

$document = JFactory::getDocument();

$cssHTML = JURI::base().'components/com_steamy/style/streamy.css';
$document->addStyleSheet($cssHTML);

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));

$html = array();

if ($this->params->get('show_page_heading', 1)) : 
	$html[] = '<h1>';
		if ($this->escape($this->params->get('page_heading'))) :
			$html[] = $this->escape($this->params->get('page_heading')); 
		else : 
			$html[] = $this->escape($this->params->get('page_title')); 
		endif;
	$html[] = '</h1>';
 endif; 

$html[] = '<form action="'. JRoute::_('index.php?option=com_steamy&view=channels').'" method="post" name="adminForm" id="adminForm">';

foreach($this->items as $i => $item)
{	
	$html[] = '	<div>';
	$html[] = $item->name;
	$html[] = '		<div>';
	
	$template = str_replace('{name}',$item->url,$item->urltemplate);
	$template = str_replace('{width}',$item->width,$template);
	$template = str_replace('{height}',$item->height,$template);
	
	$html[] = $template;
	
	$html[] = '		</div>';
	$html[] = '	</div>';
}

$html[] = '	<div>';
$html[] = '		<input type="hidden" name="task" value="" />';
$html[] = '		<input type="hidden" name="boxchecked" value="0" />';
$html[] = '		<input type="hidden" name="filter_order" value="' . $listOrder .'" />';
$html[] = '		<input type="hidden" name="filter_order_Dir" value="' . $listDirn . '" />';
$html[] = JHtml::_('form.token');
$html[] = '	</div>';
$html[] = '</form>';

echo implode("\n", $html); 
?>