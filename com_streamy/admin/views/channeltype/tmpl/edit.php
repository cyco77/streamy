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

JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_streamy&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm">	
	<div class="form-horizontal">
		<?php echo $this->form->getControlGroup('id'); ?>
		<?php echo $this->form->getControlGroup('name'); ?>
		<?php echo $this->form->getControlGroup('url'); ?>
		<?php echo $this->form->getControlGroup('published'); ?>
	</div>
	<div>
		<input type="hidden" name="task" value="channeltype.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>

