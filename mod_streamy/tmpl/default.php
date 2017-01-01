<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 

$template = str_replace('{name}',$channel->url,$channel->urltemplate);
$template = str_replace('{width}',$width,$template);
$template = str_replace('{height}',$height,$template);

echo $template;