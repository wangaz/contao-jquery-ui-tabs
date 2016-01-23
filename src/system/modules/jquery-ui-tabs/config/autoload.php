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
 * Register the namespaces
 */
ClassLoader::addNamespaces(array(
	'JUiTab',
));


/*
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'JUiTab\ContentTab'		 		=> 'system/modules/jquery-ui-tabs/elements/ContentTab.php',
	'JUiTab\ContentTabStart' 		=> 'system/modules/jquery-ui-tabs/elements/ContentTabStart.php',
	'JUiTab\ContentTabSeparator'	=> 'system/modules/jquery-ui-tabs/elements/ContentTabSeparator.php',
	'JUiTab\ContentTabStop' 		=> 'system/modules/jquery-ui-tabs/elements/ContentTabStop.php',
));


/*
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_jui_tab_start'		=> 'system/modules/jquery-ui-tabs/templates',
	'ce_jui_tab_separator'	=> 'system/modules/jquery-ui-tabs/templates',
	'ce_jui_tab_stop'		=> 'system/modules/jquery-ui-tabs/templates',
	'j_ui_tabs'				=> 'system/modules/jquery-ui-tabs/templates',
));
