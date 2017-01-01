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

$html = array();

$html[] = '<div>';
$html[] = $this->item->name;
$html[] = '	<div>';

$template = str_replace('{name}',$this->item->url,$this->item->urltemplate);
$template = str_replace('{width}',$this->item->width,$template);
$template = str_replace('{height}',$this->item->height,$template);

$html[] = $template;

$html[] = '	</div>';

if (isset($this->item->chaturl) && $this->item->chaturl != '')
{
	$html[] = '	<div>';
	$html[] = $this->item->chaturl;
	$html[] = '	</div>';
}

$html[] = '</div>';

echo implode("\n", $html); 

?>