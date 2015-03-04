<?php
	
/**
 * jQuery UI Tabs Widget for Contao Open Source CMS
 *
 * @copyright wangaz. GbR 2015
 * @author wangaz. GbR <hallo@wangaz.com>
 * @link https://wangaz.com
 * @license http://creativecommons.org/licenses/by-sa/4.0/ CC BY-SA 4.0
 */
 

namespace JUiTab;

	
/**
 * Class ContentTab
 *
 * @copyright wangaz. GbR 2015
 * @author wangaz. GbR <hallo@wangaz.com>
 * @link https://wangaz.com
 * @license http://creativecommons.org/licenses/by-sa/4.0/ CC BY-SA 4.0
 */
abstract class ContentTab extends \ContentElement
{	
	/**
	 * Generate the content element
	 */
	protected function compile()
	{			
		$arrHeadline = deserialize($this->juiTabHeadline);
		
		if (TL_MODE == 'BE')
		{
			$this->strTemplate = 'be_wildcard';
			$this->Template = new \BackendTemplate($this->strTemplate);
			$this->Template->title = is_array($arrHeadline) ? $arrHeadline['value'] : $arrHeadline;
		}
		
		$this->Template->headline	= is_array($arrHeadline) ? $arrHeadline['value'] : $arrHeadline;
		$this->Template->hl			= is_array($arrHeadline) ? $arrHeadline['unit'] : 'h1';
		$this->Template->alias 		= $this->juiTabAlias;
	}
}
