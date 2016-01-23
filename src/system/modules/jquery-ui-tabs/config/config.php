<?php

/**
 * jQuery UI Tabs Widget for Contao Open Source CMS
 *
 * @copyright wangaz. GbR 2015 - 2016
 * @author wangaz. GbR <hallo@wangaz.com>
 * @link https://wangaz.com
 * @license http://creativecommons.org/licenses/by-sa/4.0/ CC BY-SA 4.0
 */


/*
 * Content elements
 */
array_insert($GLOBALS['TL_CTE'], 1, array
(
	'juiTab' => array(
		'juiTabStart'		=> 'JUiTab\ContentTabStart',
		'juiTabSeparator'	=> 'JUiTab\ContentTabSeparator',
		'juiTabStop'		=> 'JUiTab\ContentTabStop',
	),
));


/*
 * Wrapper elements
 */
$GLOBALS['TL_WRAPPERS']['start'][]		= 'juiTabStart';
$GLOBALS['TL_WRAPPERS']['separator'][]	= 'juiTabSeparator';
$GLOBALS['TL_WRAPPERS']['stop'][]		= 'juiTabStop';
